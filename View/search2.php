<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: rgb(10, 10, 10);
            color: #fff;
        }
        .search {
            border: 2px solid white;
            border-radius: 10px;
            padding: 8px 12px;
            width: 100%;
            margin-bottom: 20px;
        }
        .video-thumbnail {
            width: 100%;
            max-width: 280px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Search bar -->
                <input type="text" class="form-control search mb-4" placeholder="Search videos by title...">
                <!-- End Search bar -->
            </div>
        </div>
        <div class="row" id="videoCards">
            <!-- Static Video Cards -->
            <div class="col-md-4 mb-4">
                <div class="card" data-title="Live Event">
                    <img src="../Images/liveevent1.png" class="card-img-top video-thumbnail" alt="Live Event">
                    <div class="card-body">
                        <h5 class="card-title">Live Event</h5>
                        <p class="card-text">Description of the Live Event video.</p>
                        <video class="video" width="280" height="180" controls>
                            <source src="../project.aptech/dunki-o-maahi-full-video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card" data-title="Made for You">
                    <img src="../Images/madeforyou2.png" class="card-img-top video-thumbnail" alt="Made for You">
                    <div class="card-body">
                        <h5 class="card-title">Made for You</h5>
                        <p class="card-text">Description of the Made for You video.</p>
                        <video class="video" width="280" height="180" controls>
                            <source src="../project.aptech/dunki-o-maahi-full-video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card" data-title="New Release">
                    <img src="../Images/newrelease3.png" class="card-img-top video-thumbnail" alt="New Release">
                    <div class="card-body">
                        <h5 class="card-title">New Release</h5>
                        <p class="card-text">Description of the New Release video.</p>
                        <video class="video" width="280" height="180" controls>
                            <source src="../project.aptech/dunki-o-maahi-full-video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
            <!-- End Static Video Cards -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search');
            const videoCards = document.querySelectorAll('#videoCards .card');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.trim().toLowerCase();

                videoCards.forEach(card => {
                    const title = card.getAttribute('data-title').toLowerCase();
                    const shouldShow = title.includes(searchTerm);

                    card.style.display = shouldShow ? 'block' : 'none';
                });
            });
        });
    </script>
</body>
</html>
