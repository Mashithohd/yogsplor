<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (Untuk icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .bg-overlay {
            background-color: rgba(67, 104, 80, 0.5);
            min-height: 100vh;
            padding: 20px;
        }

        .day-card {
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            position: relative;
            margin-top: 150px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .add-btn, .save-btn {
            margin-top: 20px;
            cursor: pointer;
            text-align: center;
        }

        .add-btn i, .save-btn span {
            font-size: 24px;
        }

        .add-btn {
            color: #007bff;
        }

        .save-btn {
            color: rgba(67, 104, 80, 1);
        }

        .day-desc-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .day-desc {
            flex: 1;
        }

        .delete-icon {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Background Overlay Container -->
    <div class="bg-overlay">
        <!-- Card Container -->
        <div id="card-container" class="card-container">
            <!-- Day cards will be dynamically added here -->
        </div>

        <!-- Save Button -->
        <button id="save-button" class="save-btn">
            <span class="text-black">Simpan</span>
        </button>
    </div>

    <script>
        function deleteDay(dayId) {
            document.getElementById(dayId).remove();
            updateLocalStorage();
        }

        function deleteDayDesc(element) {
            element.parentElement.remove();
            updateLocalStorage();
        }

        function updateLocalStorage() {
            const cardContainer = document.getElementById('card-container');
            const dayCards = cardContainer.getElementsByClassName('day-card');
            const notes = [];

            for (let i = 0; i < dayCards.length; i++) {
                const dayCard = dayCards[i];
                const dayId = dayCard.id.replace('day', '');
                const dayDescs = dayCard.getElementsByClassName('day-desc');
                const dayData = [];

                for (let j = 0; j < dayDescs.length; j++) {
                    dayData.push(dayDescs[j].innerText);
                }

                notes.push({
                    day: dayId,
                    hotelName: dayData[0] || '',
                    wisata: dayData[1] || '',
                    makan: dayData[2] || ''
                });
            }

            localStorage.setItem('notes', JSON.stringify(notes));
        }

        function addNoteToDay(day, hotelName, wisata, makan) {
            let dayCard = document.getElementById('day' + day);
            if (!dayCard) {
                dayCard = document.createElement('div');
                dayCard.className = 'day-card';
                dayCard.id = 'day' + day;
                dayCard.innerHTML = `
                    <i class="fas fa-times close-btn" onclick="deleteDay('day${day}')"></i>
                    <div class="day-title">Hari ${day}</div>
                `;
                document.getElementById('card-container').appendChild(dayCard);
            }

            let content = '';
            if (hotelName) content += `<div class="day-desc">${hotelName}</div>`;
            if (wisata) content += `<div class="day-desc">${wisata}</div>`;
            if (makan) content += `<div class="day-desc">${makan}</div>`;

            dayCard.innerHTML += `
                <div class="day-desc-container">
                    ${content}
                    <i class="fas fa-trash delete-icon" onclick="deleteDayDesc(this)"></i>
                </div>
            `;

            updateLocalStorage();
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Load notes from localStorage
            const notes = JSON.parse(localStorage.getItem('notes')) || [];
            notes.forEach(note => {
                addNoteToDay(note.day, note.hotelName, note.wisata, note.makan);
            });

            // Save button click event
            document.getElementById('save-button').addEventListener('click', function() {
                generatePDF();
            });
        });

        function generatePDF() {
            const notes = JSON.parse(localStorage.getItem('notes')) || [];
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            let y = 20;

            notes.forEach(note => {
                const text = `Hari ${note.day}:\nHotel: ${note.hotelName}\nWisata: ${note.wisata}\nMakan: ${note.makan}\n\n`;
                doc.text(text, 10, y);
                y += 30;
            });

            // Simpan file PDF
            doc.save('catatan.pdf');
        }
    </script>

    <!-- Library jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <!-- Script untuk Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
