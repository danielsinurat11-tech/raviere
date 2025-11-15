from fastapi import FastAPI
from pydantic import BaseModel
from fastapi.middleware.cors import CORSMiddleware
import base64
import numpy as np
import cv2
from io import BytesIO
from PIL import Image

try:
	import mediapipe as mp
	has_mp = True
except Exception:
	has_mp = False

app = FastAPI(title="Lumina Face AI", version="1.0")

# Allow local origins
app.add_middleware(
	CORSMiddleware,
	allow_origins=["*"],
	allow_credentials=True,
	allow_methods=["*"],
	allow_headers=["*"],
)

class DetectRequest(BaseModel):
	imageData: str

@app.post("/detect")
def detect(req: DetectRequest):
	if not has_mp:
		return {"success": False, "message": "mediapipe not installed"}

	# Decode base64 data URL
	data = req.imageData
	if not data.startswith("data:image"):
		return {"success": False, "message": "invalid data url"}
	try:
		head, b64 = data.split(',', 1)
		img_bytes = base64.b64decode(b64)
		image = Image.open(BytesIO(img_bytes)).convert('RGB')
		frame = np.array(image)  # RGB
	except Exception as e:
		return {"success": False, "message": f"decode error: {e}"}

	# MediaPipe face detection
	mp_fd = mp.solutions.face_detection
	with mp_fd.FaceDetection(model_selection=0, min_detection_confidence=0.5) as fd:
		results = fd.process(frame)
		faces = []
		if results.detections:
			for det in results.detections:
				bbox = det.location_data.relative_bounding_box
				faces.append({
					"score": float(det.score[0]) if det.score else 0.0,
					"bbox": {
						"x": float(bbox.xmin),
						"y": float(bbox.ymin),
						"w": float(bbox.width),
						"h": float(bbox.height),
					}
				})
	return {"success": True, "faces": faces, "hasFace": len(faces) > 0}

@app.get("/")
def root():
	return {"service": "Lumina Face AI", "status": "ok"}

# To run: uvicorn main:app --host 127.0.0.1 --port 8000
