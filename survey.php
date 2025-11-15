<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Color Analysis - Raviere</title>
    <link rel="stylesheet" href="css & img/css/style.css">
    <!-- Face API.js for face detection -->
    <script src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
    <style>
        .survey-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .survey-title {
            text-align: center;
            font-family: 'Cotoris', serif;
            font-size: 2.5rem;
            color: #67622d;
            margin-bottom: 10px;
        }
        
        .survey-subtitle {
            text-align: center;
            color: #999249;
            margin-bottom: 40px;
            font-size: 1.1rem;
        }
        
        /* Introduction Section */
        .intro-section {
            text-align: center;
            padding: 60px 40px;
            background: linear-gradient(135deg, #f5f5f0 0%, #e8e8e0 100%);
            border-radius: 12px;
            margin-bottom: 40px;
        }
        
        .intro-subtitle {
            font-family: 'Cotoris', serif;
            font-size: 1.5rem;
            color: #67622d;
            margin: 20px 0;
        }
        
        .intro-description {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.8;
            max-width: 700px;
            margin: 0 auto 30px;
        }
        
        .start-button {
            padding: 18px 50px;
            background: #67622d;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'Cotoris', serif;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .start-button:hover {
            background: #5a531c;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        
        .test-section {
            margin-bottom: 40px;
            padding: 30px;
            background: #f9f9f9;
            border-radius: 8px;
            border-left: 4px solid #67622d;
        }
        
        .test-title {
            font-family: 'Cotoris', serif;
            font-size: 1.5rem;
            color: #67622d;
            margin-bottom: 20px;
        }
        
        .test-options {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .option-label {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            background: #fff;
            border: 2px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Cotoris', serif;
            font-size: 1rem;
            color: #67622d;
        }
        
        .option-label:hover {
            border-color: #67622d;
            background: #f5f5f0;
        }
        
        .option-label input[type="radio"] {
            margin-right: 10px;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        
        .option-label input[type="radio"]:checked + span {
            font-weight: bold;
        }
        
        .option-label:has(input:checked) {
            border-color: #67622d;
            background: #e4e4ac;
            color: #67622d;
        }
        
        .photo-upload {
            margin-top: 15px;
        }
        
        .photo-upload input[type="file"] {
            display: none;
        }
        
        .photo-upload-label {
            display: inline-block;
            padding: 12px 25px;
            background: #67622d;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Cotoris', serif;
            transition: background 0.3s ease;
        }
        
        .photo-upload-label:hover {
            background: #5a531c;
        }
        
        .photo-preview {
            margin-top: 15px;
            max-width: 300px;
            border-radius: 8px;
            overflow: hidden;
            display: none !important;
            visibility: hidden;
        }
        
        .photo-preview.show {
            display: block !important;
            visibility: visible !important;
        }
        
        .photo-preview img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
        }
        
        .face-scan-section {
            margin-top: 40px;
            padding: 30px;
            background: linear-gradient(135deg, #f5f5f0 0%, #e8e8e0 100%);
            border-radius: 8px;
            text-align: center;
        }
        
        .scan-button {
            padding: 15px 40px;
            background: #67622d;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'Cotoris', serif;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        
        .scan-button:hover {
            background: #5a531c;
            transform: translateY(-2px);
        }
        
        .scan-preview {
            margin-top: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 8px;
            overflow: hidden;
            display: none !important;
            visibility: hidden;
        }
        
        .scan-preview.show {
            display: block !important;
            visibility: visible !important;
        }
        
        .scan-preview img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
        }
        
        .submit-button {
            width: 100%;
            padding: 18px;
            background: #67622d;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'Cotoris', serif;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 30px;
        }
        
        .submit-button:hover {
            background: #5a531c;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        
        .submit-button:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }
        
        .result-section {
            display: none;
            margin-top: 40px;
            padding: 40px;
            background: linear-gradient(135deg, #f5f5f0 0%, #e8e8e0 100%);
            border-radius: 12px;
            text-align: center;
        }
        
        .result-title {
            font-family: 'Cotoris', serif;
            font-size: 2rem;
            color: #67622d;
            margin-bottom: 20px;
        }
        
        .undertone-result {
            font-family: 'Cotoris', serif;
            font-size: 1.5rem;
            color: #999249;
            margin-bottom: 30px;
            padding: 15px;
            background: #fff;
            border-radius: 8px;
            display: inline-block;
        }
        
        .color-palette {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 30px 0;
        }
        
        .color-swatch {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 0.9rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        
        .recommendation {
            margin-top: 30px;
            padding: 25px;
            background: #fff;
            border-radius: 8px;
            text-align: left;
        }
        
        .recommendation h3 {
            font-family: 'Cotoris', serif;
            color: #67622d;
            margin-bottom: 15px;
        }
        
        .recommendation p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        
        .reset-button {
            margin-top: 20px;
            padding: 12px 30px;
            background: #999249;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'Cotoris', serif;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .reset-button:hover {
            background: #7a7539;
        }

        .see-more {
            display: inline-block;
            padding: 12px 30px;
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid #ffffff;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        /* Circular face guide */
        .face-guide {
            position: absolute;
            inset: 0;
            pointer-events: none;
            --guide-size: 220px; /* default, will be overridden by JS */
            /* dim background via radial mask */
            background: radial-gradient(circle at 50% 50%, rgba(0,0,0,0) calc(var(--guide-size)/2), rgba(0,0,0,0.55) calc(var(--guide-size)/2 + 1px));
            border-radius: 8px;
        }
        .face-guide::after{
            /* White ring border (perfect circle) */
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: var(--guide-size);
            height: var(--guide-size);
            transform: translate(-50%, -50%);
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.9);
            box-shadow: 0 0 10px rgba(0,0,0,0.25);
        }
    </style>
</head>
<body>
    <!-- header-->
    <header>
        <div class="container">
            <h1><a href="home.php">Raviere</a></h1>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="aboutUs.php">ABOUT US</a></li>
                <li><a href="portofolio.php">PORTOFOLIO</a></li>
                <li class="active"><a href="survey.php">SURVEY</a></li>
                <li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php">LOGOUT</a>
                    <?php else: ?>
                        <a href="Login.php">LOGIN / REGISTER</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </header>

    <!--Survey Form-->
    <div class="container">
        <div class="survey-container">
            <!-- Introduction Section -->
            <div class="intro-section" id="introSection">
                <h1 class="survey-title">Color Analysis</h1>
                <h2 class="intro-subtitle">Temukan undertone Anda dan rekomendasi warna terbaik</h2>
                <p class="intro-description">
                    Survey ini akan membantu Anda menemukan undertone kulit Anda (warm, cool, atau neutral) 
                    dan memberikan rekomendasi warna pakaian serta makeup yang paling cocok untuk Anda. 
                    Jawablah setiap pertanyaan dengan jujur untuk hasil yang akurat.
                </p>
                <button type="button" class="start-button" onclick="startSurvey()">Mulai Tes</button>
            </div>
            
            <form id="colorAnalysisForm" style="display: none;">
                <!-- Test 1: Vein Test -->
                <div class="test-section">
                    <h2 class="test-title">Tes 1: Urat Nadi (Vein Test)</h2>
                    <p style="color: #666; margin-bottom: 20px;">Lihat urat nadi di pergelangan tangan Anda. Warna apa yang terlihat?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="veinTest" value="green" required>
                            <span>Hijau</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="veinTest" value="blue">
                            <span>Biru/Ungu</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="veinTest" value="mixed">
                            <span>Campuran</span>
                        </label>
                    </div>
                    <div class="photo-upload">
                        <button type="button" class="photo-upload-label" onclick="openCamera('vein')">📷 Buka Kamera untuk Foto Urat Nadi</button>
                        <input type="file" id="veinPhoto" name="veinPhoto" accept="image/*" capture="camera" style="display: none;" onchange="previewPhoto(this, 'veinPreview')">
                        <div id="veinCameraContainer" style="display: none; margin-top: 20px;">
                            <video id="veinCamera" autoplay playsinline style="width: 100%; max-width: 400px; border-radius: 8px;"></video>
                            <canvas id="veinCanvas" style="display: none;"></canvas>
                            <div style="margin-top: 15px;">
                                <button type="button" class="photo-upload-label" onclick="capturePhoto('vein')" style="background: #5a531c;">📸 Ambil Foto</button>
                                <button type="button" class="photo-upload-label" onclick="closeCamera('vein')" style="background: #999249; margin-left: 10px;">❌ Tutup Kamera</button>
                            </div>
                        </div>
                        <div class="photo-preview" id="veinPreview">
                            <img src="" alt="Vein Photo Preview">
                        </div>
                    </div>
                </div>

                <!-- Test 2: Jewelry Test -->
                <div class="test-section">
                    <h2 class="test-title">Tes 2: Perhiasan (Jewelry Test)</h2>
                    <p style="color: #666; margin-bottom: 20px;">Perhiasan apa yang lebih cocok dengan kulit Anda?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="jewelryTest" value="gold" required>
                            <span>Emas</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="jewelryTest" value="silver">
                            <span>Perak</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="jewelryTest" value="both">
                            <span>Keduanya</span>
                        </label>
                    </div>
                </div>

                <!-- Test 3: Sun Test -->
                <div class="test-section">
                    <h2 class="test-title">Tes 3: Reaksi Matahari (Sun Test)</h2>
                    <p style="color: #666; margin-bottom: 20px;">Bagaimana reaksi kulit Anda saat terkena sinar matahari?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="sunTest" value="tan" required>
                            <span>Cokelat/Tan</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="sunTest" value="burn">
                            <span>Merah/Terbakar</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="sunTest" value="mixed">
                            <span>Campuran</span>
                        </label>
                    </div>
                </div>

                <!-- Test 4: Eye Color Test -->
                <div class="test-section">
                    <h2 class="test-title">Tes 4: Warna Mata (Eye Color Test)</h2>
                    <p style="color: #666; margin-bottom: 20px;">Apa warna mata alami Anda?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="eyeColor" value="brown" required>
                            <span>Cokelat</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="eyeColor" value="hazel">
                            <span>Hazel</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="eyeColor" value="green">
                            <span>Hijau</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="eyeColor" value="blue">
                            <span>Biru</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="eyeColor" value="black">
                            <span>Hitam</span>
                        </label>
                    </div>
                </div>

                <!-- Test 5: Natural Hair Color Test -->
                <div class="test-section">
                    <h2 class="test-title">Tes 5: Warna Rambut Asli (Natural Hair Color Test)</h2>
                    <p style="color: #666; margin-bottom: 20px;">Apa warna rambut alami Anda?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="hairColor" value="black" required>
                            <span>Hitam</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="hairColor" value="darkBrown">
                            <span>Cokelat Gelap</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="hairColor" value="lightBrown">
                            <span>Cokelat Terang</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="hairColor" value="blonde">
                            <span>Pirang</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="hairColor" value="reddish">
                            <span>Kemerahan</span>
                        </label>
                    </div>
                </div>

                <!-- Test 6: Skin Tone Without Makeup -->
                <div class="test-section">
                    <h2 class="test-title">Tes 6: Nuansa Warna Kulit Tanpa Makeup</h2>
                    <p style="color: #666; margin-bottom: 20px;">Bagaimana nuansa warna kulit alami Anda tanpa makeup?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="skinTone" value="pinkish" required>
                            <span>Pinkish (Kemerahan)</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="skinTone" value="yellowGolden">
                            <span>Yellow-Golden (Kekuningan)</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="skinTone" value="olive">
                            <span>Olive (Zaitun)</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="skinTone" value="neutral">
                            <span>Neutral (Netral)</span>
                        </label>
                    </div>
                </div>

                <!-- Test 7: White Paper Test -->
                <div class="test-section">
                    <h2 class="test-title">Tes 7: White Paper Test</h2>
                    <p style="color: #666; margin-bottom: 20px;">Letakkan kertas putih di dekat wajah Anda. Bagaimana kulit Anda terlihat?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="whitePaper" value="pink" required>
                            <span>Pink (Kemerahan)</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="whitePaper" value="yellow">
                            <span>Kuning</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="whitePaper" value="bluish">
                            <span>Kebiruan</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="whitePaper" value="neutral">
                            <span>Netral</span>
                        </label>
                    </div>
                </div>

                <!-- Test 8: Clothing Color Test -->
                <div class="test-section">
                    <h2 class="test-title">Tes 8: Warna Pakaian (Clothing Color Test)</h2>
                    <p style="color: #666; margin-bottom: 20px;">Warna pakaian apa yang membuat wajah Anda terlihat lebih cerah?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="clothingColor" value="white" required>
                            <span>Putih</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="clothingColor" value="cream">
                            <span>Cream</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="clothingColor" value="black">
                            <span>Black</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="clothingColor" value="pastel">
                            <span>Pastel</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="clothingColor" value="earthTone">
                            <span>Earth Tone</span>
                        </label>
                    </div>
                </div>

                <!-- Test 9: Makeup Shade Test -->
                <div class="test-section">
                    <h2 class="test-title">Tes 9: Shade Foundation (Makeup Shade Test)</h2>
                    <p style="color: #666; margin-bottom: 20px;">Shade foundation apa yang paling cocok dengan kulit Anda?</p>
                    <div class="test-options">
                        <label class="option-label">
                            <input type="radio" name="makeupShade" value="warm" required>
                            <span>Warm (Hangat)</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="makeupShade" value="cool">
                            <span>Cool (Dingin)</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="makeupShade" value="neutral">
                            <span>Neutral (Netral)</span>
                        </label>
                        <label class="option-label">
                            <input type="radio" name="makeupShade" value="unsure">
                            <span>Tidak Yakin</span>
                        </label>
                    </div>
                </div>

                <!-- Face Scan -->
                <div class="face-scan-section">
                    <h2 class="test-title">Scan Wajah</h2>
                    <p style="color: #666; margin-bottom: 20px;">Buka kamera untuk scan wajah Anda untuk analisis yang lebih akurat</p>
                    <button type="button" class="photo-upload-label" onclick="openCamera('face')">📷 Buka Kamera untuk Scan Wajah</button>
                    <input type="file" id="faceScan" name="faceScan" accept="image/*" capture="camera" style="display: none;" onchange="previewPhoto(this, 'facePreview')">
                    <div id="faceCameraContainer" style="display: none; margin-top: 20px; position: relative;">
                        <div style="position: relative; display: inline-block; width: 100%; max-width: 400px; margin: 0 auto;">
                            <video id="faceCamera" autoplay playsinline style="width: 100%; border-radius: 8px; display: block;"></video>
                            <canvas id="faceOverlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;"></canvas>
                            <div class="face-guide" aria-hidden="true"></div>
                            <div id="faceDetectionStatus" style="position: absolute; top: 10px; left: 10px; background: rgba(0,0,0,0.7); color: #fff; padding: 8px 15px; border-radius: 20px; font-size: 0.9rem; display: none;">
                                <span id="faceStatusText">Mencari wajah...</span>
                            </div>
                        </div>
                        <canvas id="faceCanvas" style="display: none;"></canvas>
                        <div style="margin-top: 15px; text-align: center;">
                            <button type="button" class="photo-upload-label" onclick="closeCamera('face')" style="background: #999249;">❌ Tutup Kamera</button>
                        </div>
                    </div>
                    <div class="scan-preview" id="facePreview">
                        <img src="" alt="Face Scan Preview">
                        <div style="display:flex; gap:10px; justify-content:center; padding:12px;">
                            <button type="button" class="photo-upload-label" style="background:#999249;" onclick="openCamera('face')">🔁 Ulangi</button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-button" id="submitBtn">Analisis Warna Saya</button>
            </form>

            <!-- Result Section -->
            <div class="result-section" id="resultSection">
                <h2 class="result-title">Hasil Analisis Warna Anda</h2>
                <div class="undertone-result" id="undertoneResult"></div>
                <div class="color-palette" id="colorPalette"></div>
                <div class="recommendation" id="recommendation"></div>
                <button class="reset-button" onclick="resetForm()">Ulangi Tes</button>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="container">
            <a href="home.php" class="footer-logo">Raviere</a>
            <div class="social-media">
                <a href="https://www.instagram.com/raviere.official?igsh=emJkMWxsNjNnaGw0" target="_blank" class="social-link" title="Instagram">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="https://www.tiktok.com/@raviere.official?_r=1&_t=ZS-91HVecYjoaQ" target="_blank" class="social-link" title="TikTok">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                    </svg>
                </a>
                <a href="https://wa.me/6285161585651" target="_blank" class="social-link" title="WhatsApp">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </a>
                <a href="https://id.shp.ee/7zTfhjE" target="_blank" class="social-link" title="Shopee">
                    <img src="css & img/image/shopee.png" alt="Shopee">
                </a>
                <a href="https://tk.tokopedia.com/ZSyqrXLpq/" target="_blank" class="social-link" title="Tokopedia">
                    <img src="css & img/image/tokopedia.png" alt="Tokopedia">
                </a>
                <a href="https://www.facebook.com/raviere.id" target="_blank" class="social-link" title="Facebook">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
            </div>
            <div class="copyright">
                <small>Copyright &copy; 2020. Raviere. All Right Reserve.</small>
            </div>
        </div>
    </footer>

    <script>
        // Start survey function
        function startSurvey() {
            document.getElementById('introSection').style.display = 'none';
            document.getElementById('colorAnalysisForm').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        
        // Color palettes based on undertone
        const colorPalettes = {
            warm: {
                name: 'Warm Undertone',
                colors: [
                    { name: 'Coral', hex: '#FF6B6B' },
                    { name: 'Peach', hex: '#FFB88C' },
                    { name: 'Gold', hex: '#FFD93D' },
                    { name: 'Terracotta', hex: '#E17055' },
                    { name: 'Cream', hex: '#FFF8E1' },
                    { name: 'Olive', hex: '#8B9A46' }
                ],
                recommendation: 'Anda memiliki undertone hangat! Warna-warna yang cocok untuk Anda adalah warna hangat seperti coral, peach, emas, terracotta, dan krem. Hindari warna yang terlalu dingin seperti biru muda atau pink yang terlalu pucat.'
            },
            cool: {
                name: 'Cool Undertone',
                colors: [
                    { name: 'Navy', hex: '#2C3E50' },
                    { name: 'Rose', hex: '#E91E63' },
                    { name: 'Lavender', hex: '#9B59B6' },
                    { name: 'Mint', hex: '#00D2D3' },
                    { name: 'Silver', hex: '#BDC3C7' },
                    { name: 'Berry', hex: '#8E44AD' }
                ],
                recommendation: 'Anda memiliki undertone dingin! Warna-warna yang cocok untuk Anda adalah warna dingin seperti navy, rose, lavender, mint, dan silver. Hindari warna yang terlalu hangat seperti oranye terang atau kuning mustard.'
            },
            neutral: {
                name: 'Neutral Undertone',
                colors: [
                    { name: 'Dusty Rose', hex: '#D4A5A5' },
                    { name: 'Sage', hex: '#87CEEB' },
                    { name: 'Taupe', hex: '#A0826D' },
                    { name: 'Blush', hex: '#F4A6A6' },
                    { name: 'Slate', hex: '#708090' },
                    { name: 'Mauve', hex: '#E0B0FF' }
                ],
                recommendation: 'Anda memiliki undertone netral! Anda beruntung karena bisa memakai hampir semua warna. Warna-warna yang paling cocok adalah dusty rose, sage, taupe, blush, slate, dan mauve. Kombinasi warna hangat dan dingin juga akan terlihat bagus pada Anda.'
            }
        };

        // Scoring system
        function calculateUndertone(formData) {
            let warmScore = 0;
            let coolScore = 0;
            let neutralScore = 0;

            // Vein Test scoring
            if (formData.veinTest === 'green') warmScore += 2;
            else if (formData.veinTest === 'blue') coolScore += 2;
            else if (formData.veinTest === 'mixed') neutralScore += 1;

            // Jewelry Test scoring
            if (formData.jewelryTest === 'gold') warmScore += 2;
            else if (formData.jewelryTest === 'silver') coolScore += 2;
            else if (formData.jewelryTest === 'both') neutralScore += 2;

            // Sun Test scoring
            if (formData.sunTest === 'tan') warmScore += 2;
            else if (formData.sunTest === 'burn') coolScore += 2;
            else if (formData.sunTest === 'mixed') neutralScore += 1;

            // Eye Color Test scoring
            if (formData.eyeColor === 'brown' || formData.eyeColor === 'hazel') warmScore += 1;
            else if (formData.eyeColor === 'blue' || formData.eyeColor === 'green') coolScore += 1;
            else if (formData.eyeColor === 'black') neutralScore += 1;

            // Hair Color Test scoring
            if (formData.hairColor === 'reddish' || formData.hairColor === 'lightBrown') warmScore += 1;
            else if (formData.hairColor === 'blonde') coolScore += 1;
            else if (formData.hairColor === 'black' || formData.hairColor === 'darkBrown') neutralScore += 1;

            // Skin Tone Test scoring
            if (formData.skinTone === 'yellowGolden') warmScore += 2;
            else if (formData.skinTone === 'pinkish') coolScore += 2;
            else if (formData.skinTone === 'olive' || formData.skinTone === 'neutral') neutralScore += 1;

            // White Paper Test scoring
            if (formData.whitePaper === 'yellow') warmScore += 2;
            else if (formData.whitePaper === 'pink' || formData.whitePaper === 'bluish') coolScore += 2;
            else if (formData.whitePaper === 'neutral') neutralScore += 1;

            // Clothing Color Test scoring
            if (formData.clothingColor === 'cream' || formData.clothingColor === 'earthTone') warmScore += 1;
            else if (formData.clothingColor === 'white' || formData.clothingColor === 'pastel') coolScore += 1;
            else if (formData.clothingColor === 'black') neutralScore += 1;

            // Makeup Shade Test scoring
            if (formData.makeupShade === 'warm') warmScore += 2;
            else if (formData.makeupShade === 'cool') coolScore += 2;
            else if (formData.makeupShade === 'neutral') neutralScore += 1;
            // unsure doesn't add to any score

            // Determine undertone
            if (neutralScore >= warmScore && neutralScore >= coolScore) {
                return 'neutral';
            } else if (warmScore > coolScore) {
                return 'warm';
            } else {
                return 'cool';
            }
        }

        // Camera stream variables
        let cameraStreams = {
            vein: null,
            face: null
        };

        // Face detection variables
        let faceDetectionInterval = null;
        let faceModelsLoaded = false;
        let faceDetectedCount = 0;
        const FACE_DETECTION_THRESHOLD = 0.7; // Confidence threshold
        const FACE_DETECTION_FRAMES = 10; // Number of consecutive detections before auto-capture
        const AI_ENDPOINT = 'http://127.0.0.1:8000/detect';

        async function isAiAlive() {
            try {
                const base = AI_ENDPOINT.replace(/\/detect$/, '/');
                const r = await fetch(base, { method: 'GET' });
                if (!r.ok) return false;
                await r.json();
                return true;
            } catch (e) {
                console.warn('AI service not reachable', e);
                return false;
            }
        }

        // Load face detection models
        async function loadFaceModels() {
            if (faceModelsLoaded) return true;
            
            try {
                // Use jsdelivr CDN for model weights
                const MODEL_URL = 'https://cdn.jsdelivr.net/npm/@vladmandic/face-api/model/';
                await Promise.all([
                    faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL),
                    faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL)
                ]);
                faceModelsLoaded = true;
                console.log('Face detection models loaded');
                return true;
            } catch (error) {
                console.error('Error loading face models:', error);
                // Fallback: try alternative CDN
                try {
                    const MODEL_URL = 'https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights/';
                    await Promise.all([
                        faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL),
                        faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL)
                    ]);
                    faceModelsLoaded = true;
                    console.log('Face detection models loaded (fallback)');
                    return true;
                } catch (error2) {
                    console.error('Error loading face models (fallback):', error2);
                    return false;
                }
            }
        }

        // Start face detection
        async function startFaceDetection() {
            const statusDiv = document.getElementById('faceDetectionStatus');
            const statusText = document.getElementById('faceStatusText');
            statusDiv.style.display = 'block';
            statusText.textContent = 'Menghubungkan AI...';
            const alive = await isAiAlive();
            if (alive) {
                statusText.textContent = 'AI siap - memulai scan...';
                startRemoteFaceScan();
            } else {
                statusText.textContent = 'AI offline - memakai deteksi lokal';
                startLocalFaceApi();
            }
        }

        // Remote AI polling based detection
        let remoteScanTimer = null;
        function startRemoteFaceScan() {
            stopRemoteFaceScan();
            const video = document.getElementById('faceCamera');
            const canvas = document.getElementById('faceCanvas');
            const statusDiv = document.getElementById('faceDetectionStatus');
            const statusText = document.getElementById('faceStatusText');
            const overlay = document.getElementById('faceOverlay');
            const guide = document.querySelector('.face-guide');
            statusDiv.style.display = 'block';
            let okCount = 0;

            function updateGuide() {
                const rect = overlay.getBoundingClientRect();
                const minSide = Math.min(rect.width, rect.height);
                const guideSize = Math.round(minSide * 0.56); // ~56% of shortest side
                guide.style.setProperty('--guide-size', guideSize + 'px');
                // store ratio for checks against normalized center
                window.__guideRadiusRatio = (guideSize / 2) / minSide;
            }
            updateGuide();
            window.addEventListener('resize', updateGuide);

            remoteScanTimer = setInterval(async () => {
                try {
                    if (!video || video.readyState < 2) return;
                    // keep guide updated when video becomes ready
                    updateGuide();
                    // Draw frame to canvas
                    canvas.width = video.videoWidth || 640;
                    canvas.height = video.videoHeight || 480;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    const imageData = canvas.toDataURL('image/jpeg', 0.8);
                    // Send to Python AI
                    const resp = await fetch(AI_ENDPOINT, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ imageData })
                    });
                    const data = await resp.json();
                    if (data && data.success && data.hasFace) {
                        // Validate face center inside guide circle
                        let centered = true;
                        try {
                            const f = data.faces && data.faces[0];
                            if (f) {
                                const cx = f.bbox.x + f.bbox.w / 2; // relative [0..1]
                                const cy = f.bbox.y + f.bbox.h / 2;
                                const dx = cx - 0.5; // center distance
                                const dy = cy - 0.5;
                                const dist = Math.sqrt(dx*dx + dy*dy);
                                const r = window.__guideRadiusRatio || 0.28;
                                centered = dist <= r;
                            }
                        } catch(e) { centered = true; }
                        if (centered) {
                            okCount++;
                            statusText.textContent = 'Wajah terdeteksi';
                            statusDiv.style.background = 'rgba(0, 255, 0, 0.7)';
                            if (okCount >= 3) { capturePhoto('face'); stopRemoteFaceScan(); }
                        } else {
                            okCount = 0;
                            statusText.textContent = 'Posisikan wajah di dalam lingkaran';
                            statusDiv.style.background = 'rgba(255, 255, 0, 0.7)';
                        }
                    } else {
                        okCount = 0;
                        statusText.textContent = 'Mencari wajah';
                        statusDiv.style.background = 'rgba(0, 0, 0, 0.7)';
                    }
                } catch (e) {
                    console.warn('Remote AI error', e);
                }
            }, 600);
        }
        function stopRemoteFaceScan() {
            if (remoteScanTimer) {
                clearInterval(remoteScanTimer);
                remoteScanTimer = null;
            }
        }

        // Local face-api fallback detection
        async function startLocalFaceApi() {
            const video = document.getElementById('faceCamera');
            const overlay = document.getElementById('faceOverlay');
            const guide = document.querySelector('.face-guide');
            const statusDiv = document.getElementById('faceDetectionStatus');
            const statusText = document.getElementById('faceStatusText');
            if (!(await loadFaceModels())) {
                statusText.textContent = 'Gagal memuat model lokal';
                return;
            }
            statusText.textContent = 'Memulai deteksi lokal...';
            stopFaceDetection();

            function updateGuide() {
                const rect = overlay.getBoundingClientRect();
                const minSide = Math.min(rect.width, rect.height);
                const guideSize = Math.round(minSide * 0.56);
                guide.style.setProperty('--guide-size', guideSize + 'px');
                window.__guideRadiusRatio = (guideSize / 2) / minSide;
            }
            updateGuide();
            window.addEventListener('resize', updateGuide);

            faceDetectionInterval = setInterval(async () => {
                if (video.readyState === video.HAVE_ENOUGH_DATA && video.videoWidth > 0) {
                    try {
                        const detections = await faceapi
                            .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions({ inputSize: 320, scoreThreshold: 0.5 }))
                            .withFaceLandmarks();
                        const ctx = overlay.getContext('2d');
                        const rect = video.getBoundingClientRect();
                        overlay.width = rect.width;
                        overlay.height = rect.height;
                        overlay.style.width = rect.width + 'px';
                        overlay.style.height = rect.height + 'px';
                        const scaleX = overlay.width / video.videoWidth;
                        const scaleY = overlay.height / video.videoHeight;
                        updateGuide();
                        const r = window.__guideRadiusRatio || 0.28;
                        ctx.clearRect(0, 0, overlay.width, overlay.height);
                        if (detections.length > 0) {
                            const d = detections[0];
                            const box = d.detection.box;
                            const score = d.detection.score;
                            const cx = (box.x + box.width / 2) / video.videoWidth; // relative center
                            const cy = (box.y + box.height / 2) / video.videoHeight;
                            const dx = cx - 0.5, dy = cy - 0.5;
                            const dist = Math.sqrt(dx*dx + dy*dy);
                            const centered = dist <= r;
                            ctx.strokeStyle = centered ? '#00ff00' : '#ffff00';
                            ctx.lineWidth = 3;
                            ctx.strokeRect(box.x * scaleX, box.y * scaleY, box.width * scaleX, box.height * scaleY);
                            if (score > 0.7 && centered) {
                                faceDetectedCount++;
                                statusDiv.style.background = 'rgba(0, 255, 0, 0.7)';
                                statusText.textContent = 'Wajah terdeteksi - tetap di dalam lingkaran';
                                if (faceDetectedCount >= 5) { capturePhoto('face'); stopFaceDetection(); }
                            } else {
                                faceDetectedCount = 0;
                                statusDiv.style.background = 'rgba(255, 255, 0, 0.7)';
                                statusText.textContent = 'Posisikan wajah di dalam lingkaran';
                            }
                        } else {
                            faceDetectedCount = 0;
                            statusDiv.style.background = 'rgba(0,0,0,0.7)';
                            statusText.textContent = 'Mencari wajah...';
                        }
                    } catch (e) {
                        console.error('Local face detection error', e);
                    }
                }
            }, 150);
        }

        // Stop face detection
        function stopFaceDetection() {
            if (faceDetectionInterval) {
                clearInterval(faceDetectionInterval);
                faceDetectionInterval = null;
            }
            faceDetectedCount = 0;
            const overlay = document.getElementById('faceOverlay');
            const ctx = overlay.getContext('2d');
            ctx.clearRect(0, 0, overlay.width, overlay.height);
            document.getElementById('faceDetectionStatus').style.display = 'none';
        }

        // Open camera function
        function openCamera(type) {
            const videoId = type + 'Camera';
            const containerId = type + 'CameraContainer';
            const previewId = type === 'vein' ? 'veinPreview' : 'facePreview';
            const video = document.getElementById(videoId);
            const container = document.getElementById(containerId);
            const preview = document.getElementById(previewId);
            
            // Hide previous preview while live camera is on
            if (preview) {
                preview.classList.remove('show');
                preview.style.display = 'none';
                preview.style.visibility = 'hidden';
            }
            
            // Ensure video element has proper attributes/styles
            video.setAttribute('playsinline', '');
            video.setAttribute('autoplay', '');
            video.setAttribute('muted', '');
            video.muted = true;
            video.style.backgroundColor = 'transparent';
            video.style.objectFit = 'cover';
            if (type === 'face') {
                // Mirror front camera for natural UX
                video.style.transform = 'scaleX(-1)';
            } else {
                video.style.transform = 'none';
            }
            
            // Check if browser supports getUserMedia
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                // Request camera access with reasonable defaults
                navigator.mediaDevices.getUserMedia({ 
                    video: { 
                        facingMode: type === 'face' ? { ideal: 'user' } : { ideal: 'environment' },
                        width: { ideal: 640 },
                        height: { ideal: 480 }
                    },
                    audio: false
                })
                .then(async function(stream) {
                    cameraStreams[type] = stream;
                    const track = stream.getVideoTracks()[0];
                    console.log('Camera settings:', track && track.getSettings ? track.getSettings() : {});
                    video.srcObject = null; // reset then set to avoid stale refs
                    video.srcObject = stream;
                    container.style.display = 'block';

                    // Helper: wait until video has dimensions
                    async function waitForVideoReady(maxWaitMs = 3000) {
                        const start = Date.now();
                        while ((video.videoWidth === 0 || video.videoHeight === 0) && (Date.now() - start) < maxWaitMs) {
                            await new Promise(r => setTimeout(r, 50));
                        }
                        return video.videoWidth > 0 && video.videoHeight > 0;
                    }

                    // Try to play and wait until ready
                    try { await video.play(); } catch (e) { console.warn('video.play() blocked, will rely on user gesture', e); }
                    const ready = await waitForVideoReady(5000);
                    if (!ready) {
                        console.warn('Video did not become ready (dimensions still 0).');
                    } else {
                        console.log('Video ready with size:', video.videoWidth, 'x', video.videoHeight);
                    }
                    
                    // Start face detection for face scan when video is ready
                    if (type === 'face') {
                        if (video.readyState >= 2) {
                            startFaceDetection();
                        } else {
                            video.addEventListener('loadeddata', () => startFaceDetection(), { once: true });
                        }
                    }
                })
                .catch(function(error) {
                    console.error('Error accessing camera:', error);
                    alert('Tidak dapat mengakses kamera. Pastikan Anda memberikan izin kamera dan tidak ada aplikasi lain yang sedang memakai kamera.');
                });
            } else {
                alert('Browser Anda tidak mendukung akses kamera. Silakan gunakan browser yang lebih baru.');
            }
        }

        // Capture photo function
        function capturePhoto(type) {
            const videoId = type + 'Camera';
            const canvasId = type + 'Canvas';
            const previewId = type === 'vein' ? 'veinPreview' : 'facePreview';
            const inputId = type === 'vein' ? 'veinPhoto' : 'faceScan';
            
            const video = document.getElementById(videoId);
            const canvas = document.getElementById(canvasId);
            const preview = document.getElementById(previewId);
            const input = document.getElementById(inputId);
            
            if (!video || !canvas || !preview || !input) {
                console.error('Elements not found for capture');
                return;
            }
            
            // Ensure video has dimensions; if 0, try using rendered size
            let vw = video.videoWidth;
            let vh = video.videoHeight;
            if (!vw || !vh) {
                const rect = video.getBoundingClientRect();
                vw = Math.max(1, Math.floor(rect.width));
                vh = Math.max(1, Math.floor(rect.height));
            }
            
            // Set canvas dimensions
            canvas.width = vw;
            canvas.height = vh;
            
            // Draw video frame to canvas
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            // Convert canvas to data URL for preview immediately
            const imageUrl = canvas.toDataURL('image/jpeg', 0.95);
            
            // Store global face image for analysis
            if (type === 'face') {
                window.__faceImageData = imageUrl;
                try {
                    // Quick undertone hint estimation from image center
                    const hint = estimateFaceUndertoneFromCanvas(canvas);
                    window.__faceUndertoneHint = hint; // 'warm' | 'cool' | 'neutral'
                    console.log('Face undertone hint:', hint);
                } catch (e) {
                    console.warn('Face undertone estimation failed', e);
                    window.__faceUndertoneHint = null;
                }
            }
            
            // Show preview immediately
            const previewImg = preview.querySelector('img');
            if (previewImg) {
                previewImg.src = imageUrl;
                previewImg.onload = function() {
                    console.log('Preview image loaded successfully');
                };
                previewImg.onerror = function(err) {
                    console.error('Error loading preview image', err);
                };
                preview.classList.add('show');
                preview.style.display = 'block';
                preview.style.visibility = 'visible';
                console.log('Preview image set:', imageUrl.substring(0, 50) + '...');
            }
            
            // Helper: convert dataURL to Blob (reliable across browsers)
            function dataURLToBlob(dataUrl) {
                const arr = dataUrl.split(',');
                const mime = arr[0].match(/:(.*?);/)[1];
                const bstr = atob(arr[1]);
                let n = bstr.length;
                const u8arr = new Uint8Array(n);
                while (n--) u8arr[n] = bstr.charCodeAt(n);
                return new Blob([u8arr], { type: mime });
            }
            
            // Try canvas.toBlob, fallback to dataURL conversion if null
            canvas.toBlob(function(blob) {
                if (!blob) {
                    console.warn('canvas.toBlob returned null, using dataURL fallback');
                    try {
                        blob = dataURLToBlob(imageUrl);
                    } catch (e) {
                        console.error('Fallback conversion failed', e);
                        return;
                    }
                }
                
                // Create a File object from blob
                const file = new File([blob], type + '-photo.jpg', { type: 'image/jpeg' });
                
                // Create a DataTransfer object to set the file
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                input.files = dataTransfer.files;
                
                console.log('File set to input:', file.name, file.size);
                
                // Close camera after capture
                closeCamera(type);
            }, 'image/jpeg', 0.95);
        }

        // Estimate undertone from face canvas (very simple heuristic)
        function estimateFaceUndertoneFromCanvas(canvas) {
            const ctx = canvas.getContext('2d');
            const w = canvas.width;
            const h = canvas.height;
            // Sample a centered rectangle region
            const rx = Math.floor(w * 0.35);
            const ry = Math.floor(h * 0.30);
            const rw = Math.floor(w * 0.30);
            const rh = Math.floor(h * 0.40);
            const data = ctx.getImageData(rx, ry, rw, rh).data;
            let rSum = 0, gSum = 0, bSum = 0, n = 0;
            for (let i = 0; i < data.length; i += 4 * 25) { // subsample for speed
                const r = data[i], g = data[i+1], b = data[i+2];
                rSum += r; gSum += g; bSum += b; n++;
            }
            if (n === 0) return null;
            const rAvg = rSum / n, gAvg = gSum / n, bAvg = bSum / n;
            // Convert to HSV-like hue approximation
            const mx = Math.max(rAvg, gAvg, bAvg), mn = Math.min(rAvg, gAvg, bAvg);
            const c = mx - mn;
            let hue = 0;
            if (c === 0) hue = 0;
            else if (mx === rAvg) hue = ((gAvg - bAvg) / c) % 6;
            else if (mx === gAvg) hue = (bAvg - rAvg) / c + 2;
            else hue = (rAvg - gAvg) / c + 4;
            hue = Math.round(hue * 60); if (hue < 0) hue += 360;
            const brightness = mx;
            // Heuristic mapping
            if ((hue >= 0 && hue <= 55) || (hue >= 330 && hue <= 360) || (rAvg > gAvg && rAvg > bAvg && (rAvg - bAvg) > 15)) {
                return 'warm';
            }
            if ((hue >= 180 && hue <= 260) || (bAvg >= rAvg && bAvg >= gAvg && (bAvg - rAvg) > 10)) {
                return 'cool';
            }
            return 'neutral';
        }

        // Close camera function
        function closeCamera(type) {
            const containerId = type + 'CameraContainer';
            const videoId = type + 'Camera';
            const container = document.getElementById(containerId);
            const video = document.getElementById(videoId);
            
            // Stop face detection if it's face camera
            if (type === 'face') {
                stopFaceDetection();
                stopRemoteFaceScan();
            }
            
            // Stop camera stream
            if (cameraStreams[type]) {
                cameraStreams[type].getTracks().forEach(track => track.stop());
                cameraStreams[type] = null;
            }
            
            // Hide container
            container.style.display = 'none';
            if (video.srcObject) {
                video.srcObject = null;
            }
        }

        // Preview photo function (for file input fallback)
        function previewPhoto(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImg = preview.querySelector('img');
                    if (previewImg) {
                        previewImg.src = e.target.result;
                        preview.classList.add('show');
                        preview.style.display = 'block';
                        preview.style.visibility = 'visible';
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Save face scan to server (removed by request)
        // function saveFaceScan() { }

        // Form submission
        document.getElementById('colorAnalysisForm').addEventListener('submit', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const formData = {
                veinTest: document.querySelector('input[name="veinTest"]:checked')?.value,
                jewelryTest: document.querySelector('input[name="jewelryTest"]:checked')?.value,
                sunTest: document.querySelector('input[name="sunTest"]:checked')?.value,
                eyeColor: document.querySelector('input[name="eyeColor"]:checked')?.value,
                hairColor: document.querySelector('input[name="hairColor"]:checked')?.value,
                skinTone: document.querySelector('input[name="skinTone"]:checked')?.value,
                whitePaper: document.querySelector('input[name="whitePaper"]:checked')?.value,
                clothingColor: document.querySelector('input[name="clothingColor"]:checked')?.value,
                makeupShade: document.querySelector('input[name="makeupShade"]:checked')?.value
            };

            // Check if all required tests are completed
            const requiredFields = ['veinTest', 'jewelryTest', 'sunTest', 'eyeColor', 'hairColor', 'skinTone', 'whitePaper', 'clothingColor', 'makeupShade'];
            const missingFields = requiredFields.filter(field => !formData[field]);
            
            if (missingFields.length > 0) {
                alert('Silakan lengkapi semua tes terlebih dahulu!');
                return false;
            }

            // Calculate undertone (form-based)
            let undertone = calculateUndertone(formData);

            // Blend with face undertone hint if available
            const hint = window.__faceUndertoneHint;
            if (hint) {
                let warmScore = (undertone === 'warm') ? 2 : 0;
                let coolScore = (undertone === 'cool') ? 2 : 0;
                let neutralScore = (undertone === 'neutral') ? 2 : 0;
                if (hint === 'warm') warmScore += 2;
                else if (hint === 'cool') coolScore += 2;
                else neutralScore += 1;
                if (neutralScore >= warmScore && neutralScore >= coolScore) undertone = 'neutral';
                else if (warmScore > coolScore) undertone = 'warm';
                else undertone = 'cool';
            }

            const palette = colorPalettes[undertone];

            // Display results
            document.getElementById('undertoneResult').textContent = `Undertone: ${palette.name}`;
            
            // Display color palette
            const paletteContainer = document.getElementById('colorPalette');
            paletteContainer.innerHTML = '';
            palette.colors.forEach(color => {
                const swatch = document.createElement('div');
                swatch.className = 'color-swatch';
                swatch.style.backgroundColor = color.hex;
                swatch.textContent = color.name;
                paletteContainer.appendChild(swatch);
            });

            // Display recommendation
            document.getElementById('recommendation').innerHTML = `
                <h3>Rekomendasi Warna Pakaian untuk Anda</h3>
                <p>${palette.recommendation}</p>
                <h3 style="margin-top: 20px;">Rekomendasi Warna Makeup (Opsional)</h3>
                <p>Untuk undertone ${palette.name.toLowerCase()}, gunakan foundation dengan undertone yang sama. 
                ${undertone === 'warm' ? 'Pilih lipstick warna coral, peach, atau terracotta. Eyeshadow hangat seperti emas, bronze, atau cokelat hangat akan sangat cocok.' : 
                  undertone === 'cool' ? 'Pilih lipstick warna rose, berry, atau plum. Eyeshadow dingin seperti silver, lavender, atau biru akan sangat cocok.' : 
                  'Anda bisa menggunakan berbagai warna makeup. Kombinasi warm dan cool tones juga akan terlihat bagus pada Anda.'}</p>
                <p style="color:#666; font-size:0.95rem; margin-top:10px;">Sumber analisis: Tes kuesioner${hint ? ' + petunjuk kulit (scan wajah)' : ''}.</p>
                <h3 style="margin-top: 20px;">One Set Warna yang Direkomendasikan:</h3>
                <p><strong>Set 1:</strong> ${palette.colors[0].name}, ${palette.colors[1].name}, dan ${palette.colors[2].name}</p>
                <p><strong>Set 2:</strong> ${palette.colors[3].name}, ${palette.colors[4].name}, dan ${palette.colors[5].name}</p>
                <button type="button" class="start-button" style="margin-top: 20px;" onclick="window.location.href='portofolio.php'">Lihat Rekomendasi Outfit</button>
            `;

            // Show result section
            document.getElementById('resultSection').style.display = 'block';
            
            // Scroll to result
            document.getElementById('resultSection').scrollIntoView({ behavior: 'smooth' });
            
            return false;
        });

        // Reset form function
        function resetForm() {
            document.getElementById('colorAnalysisForm').reset();
            document.getElementById('resultSection').style.display = 'none';
            document.getElementById('introSection').style.display = 'block';
            document.getElementById('colorAnalysisForm').style.display = 'none';
            
            // Reset vein preview
            const veinPreview = document.getElementById('veinPreview');
            if (veinPreview) {
                veinPreview.style.display = 'none';
                veinPreview.style.visibility = 'hidden';
                veinPreview.classList.remove('show');
                const veinImg = veinPreview.querySelector('img');
                if (veinImg) veinImg.src = '';
            }
            
            // Reset face preview
            const facePreview = document.getElementById('facePreview');
            if (facePreview) {
                facePreview.style.display = 'none';
                facePreview.style.visibility = 'hidden';
                facePreview.classList.remove('show');
                const faceImg = facePreview.querySelector('img');
                if (faceImg) faceImg.src = '';
            }
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>

