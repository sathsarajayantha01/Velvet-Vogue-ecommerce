<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// For demo purposes, disable database connection
$isLoggedIn = false;
$userData = [];

$selectedLocation = $_GET['location'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations - Sri Lanka's Down South Paradise</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="top-bar">
            <div class="container">
                <div class="contact-info">
                    <span><i class="fas fa-phone"></i> +94 77 123 4567</span>
                    <span><i class="fas fa-envelope"></i> info@downsouthparadise.lk</span>
                </div>
                <div class="account-nav">
                    <?php if($isLoggedIn): ?>
                        <a href="account.php"><i class="fas fa-user"></i> <?php echo htmlspecialchars($userData['first_name']); ?>'s Account</a>
                    <?php else: ?>
                        <a href="account.php"><i class="fas fa-user"></i> My Account</a>
                    <?php endif; ?>
                    <a href="bookings.php" class="booking-icon"><i class="fas fa-calendar-check"></i> My Bookings</a>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="index.php">
                        <h1>Down South Paradise</h1>
                    </a>
                </div>
                <div class="search-bar">
                    <form action="search.php" method="get">
                        <input type="text" name="query" placeholder="Search destinations, activities...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <nav class="main-nav">
            <div class="container">
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="destinations.php" class="active">Destinations</a></li>
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="travel-tips.php">Travel Tips</a></li>
                    <li><a href="cultural-heritage.php">Cultural Heritage</a></li>
                    <li><a href="accommodations.php">Stay</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Discover Paradise</h1>
            <p>Explore the breathtaking destinations that make Sri Lanka's southern coast a true tropical paradise</p>
        </div>
    </section>

    <!-- Destinations Grid -->
    <section class="destinations-showcase">
        <div class="container">
            <!-- Unawatuna -->
            <div class="destination-showcase" id="unawatuna">
                <div class="destination-hero">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800" alt="Unawatuna Beach">
                    <div class="destination-hero-content">
                        <h2>Unawatuna Beach</h2>
                        <p>The Crown Jewel of Sri Lanka's Coast</p>
                    </div>
                </div>
                <div class="destination-details">
                    <div class="detail-content">
                        <h3>A Crescent of Golden Dreams</h3>
                        <p>Imagine stepping onto a crescent of golden sand where the turquoise waters of the Indian Ocean gently kiss the shore, while towering coconut palms sway in rhythm with the ocean breeze. Unawatuna Beach isn't just a destination—it's a sensory symphony that awakens your soul to the magic of tropical paradise.</p>
                        
                        <h4>What Makes Unawatuna Special</h4>
                        <ul class="feature-list">
                            <li><i class="fas fa-swimming-pool"></i> <strong>Perfect Swimming Waters:</strong> Protected bay with calm, crystal-clear waters ideal for swimming year-round</li>
                            <li><i class="fas fa-sun"></i> <strong>Spectacular Sunsets:</strong> Watch the sun paint the sky in brilliant oranges and pinks from the comfort of beachside restaurants</li>
                            <li><i class="fas fa-fish"></i> <strong>Snorkeling Paradise:</strong> Discover vibrant coral reefs and tropical fish just meters from the shore</li>
                            <li><i class="fas fa-utensils"></i> <strong>Beachfront Dining:</strong> Savor fresh seafood with your toes in the sand at charming local restaurants</li>
                        </ul>

                        <h4>Local Experiences</h4>
                        <p>Feel the warm sand between your toes as local fishermen return with their daily catch, their traditional stilts creating an iconic silhouette against the setting sun. The gentle sound of waves mingles with the laughter of children playing cricket on the beach, while the aroma of fresh fish curry wafts from nearby eateries.</p>
                        
                        <div class="cta-section">
                            <a href="contact.php?inquiry=unawatuna" class="btn-primary">Plan Your Visit</a>
                            <a href="accommodations.php?location=unawatuna" class="btn-secondary">Find Accommodation</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mirissa -->
            <div class="destination-showcase" id="mirissa">
                <div class="destination-hero">
                    <img src="https://images.unsplash.com/photo-1582719494734-4b37e61f5c4c?w=800" alt="Mirissa Beach">
                    <div class="destination-hero-content">
                        <h2>Mirissa</h2>
                        <p>Where Giants of the Sea Dance</p>
                    </div>
                </div>
                <div class="destination-details">
                    <div class="detail-content">
                        <h3>The Whale Watching Capital</h3>
                        <p>Mirissa beckons with the promise of encountering the ocean's most magnificent creatures. This enchanting coastal town offers more than just pristine beaches—it's your gateway to witnessing blue whales, the largest animals on Earth, in their natural playground just offshore.</p>
                        
                        <h4>What Awaits You in Mirissa</h4>
                        <ul class="feature-list">
                            <li><i class="fas fa-whale"></i> <strong>Blue Whale Encounters:</strong> November to April offers the best chances to see these gentle giants</li>
                            <li><i class="fas fa-surfing"></i> <strong>World-Class Surfing:</strong> Consistent breaks perfect for both beginners and experienced surfers</li>
                            <li><i class="fas fa-moon"></i> <strong>Vibrant Nightlife:</strong> Beach bars and restaurants that come alive after sunset</li>
                            <li><i class="fas fa-camera"></i> <strong>Instagram-Worthy Spots:</strong> Iconic coconut tree hill and stunning coastal viewpoints</li>
                        </ul>

                        <h4>The Magic of Dawn</h4>
                        <p>Start your day with the fishing boats returning at sunrise, their silhouettes dancing on the horizon as seabirds dive for their morning catch. The air carries the salt-sweet scent of the ocean mixed with frangipani flowers, while the beach slowly awakens to another day in paradise.</p>
                        
                        <div class="cta-section">
                            <a href="contact.php?inquiry=mirissa" class="btn-primary">Plan Your Visit</a>
                            <a href="activities.php?type=whale-watching" class="btn-secondary">Book Whale Watching</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weligama -->
            <div class="destination-showcase" id="weligama">
                <div class="destination-hero">
                    <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800" alt="Weligama Stilt Fishermen">
                    <div class="destination-hero-content">
                        <h2>Weligama</h2>
                        <p>Where Tradition Meets Adventure</p>
                    </div>
                </div>
                <div class="destination-details">
                    <div class="detail-content">
                        <h3>The Stilt Fishermen's Legacy</h3>
                        <p>Weligama is where time stands still and ancient traditions paint living postcards against the endless blue. Watch in wonder as fishermen perch on wooden stilts in the shallow waters, a practice passed down through generations, creating one of the world's most iconic fishing scenes.</p>
                        
                        <h4>Weligama's Unique Charms</h4>
                        <ul class="feature-list">
                            <li><i class="fas fa-anchor"></i> <strong>Stilt Fishing:</strong> Witness this UNESCO-recognized traditional fishing method in action</li>
                            <li><i class="fas fa-water"></i> <strong>Surf Breaks:</strong> Coconut Tree Hill and Lazy Left offer world-class waves</li>
                            <li><i class="fas fa-island"></i> <strong>Snake Island:</strong> A picturesque temple-topped islet accessible by foot at low tide</li>
                            <li><i class="fas fa-fish"></i> <strong>Fresh Seafood:</strong> Beachside restaurants serving the day's catch</li>
                        </ul>

                        <h4>Cultural Immersion</h4>
                        <p>Feel the rhythm of local life as you stroll through the fishing village, where the sound of waves mingles with the chatter of fishermen mending their nets. The golden hour brings magic as stilt fishermen silhouette against the setting sun, creating moments that will forever be etched in your memory.</p>
                        
                        <div class="cta-section">
                            <a href="contact.php?inquiry=weligama" class="btn-primary">Plan Your Visit</a>
                            <a href="activities.php?type=surfing" class="btn-secondary">Book Surf Lessons</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yala National Park -->
            <div class="destination-showcase" id="yala">
                <div class="destination-hero">
                    <img src="https://images.unsplash.com/photo-1564760055775-d63b17a55c44?w=800" alt="Yala National Park">
                    <div class="destination-hero-content">
                        <h2>Yala National Park</h2>
                        <p>Where Wildlife Roams Free</p>
                    </div>
                </div>
                <div class="destination-details">
                    <div class="detail-content">
                        <h3>Sri Lanka's Wildlife Sanctuary</h3>
                        <p>Step into a world where leopards prowl through ancient forests and elephants roam free across vast landscapes. Yala National Park offers one of the highest leopard densities in the world, making it a wildlife photographer's dream and nature lover's paradise.</p>
                        
                        <h4>Wildlife Encounters</h4>
                        <ul class="feature-list">
                            <li><i class="fas fa-paw"></i> <strong>Leopard Spotting:</strong> Highest density of leopards in any national park worldwide</li>
                            <li><i class="fas fa-elephant"></i> <strong>Elephant Herds:</strong> Majestic Asian elephants in their natural habitat</li>
                            <li><i class="fas fa-feather"></i> <strong>Bird Paradise:</strong> Over 215 bird species including endemic varieties</li>
                            <li><i class="fas fa-bear"></i> <strong>Sloth Bears:</strong> Rare sightings of these elusive creatures</li>
                        </ul>

                        <h4>Safari Adventure</h4>
                        <p>Dawn breaks with the call of peacocks as your safari jeep ventures into the wilderness. The air is crisp and filled with anticipation as your guide points out fresh leopard tracks in the red earth. Every rustle in the bush could reveal a magnificent spotted cat or a family of elephants making their way to a watering hole.</p>
                        
                        <div class="cta-section">
                            <a href="contact.php?inquiry=yala" class="btn-primary">Plan Your Safari</a>
                            <a href="activities.php?type=safari" class="btn-secondary">Book Safari Tour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="destination-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Discover Your Paradise?</h2>
                <p>Let us create a personalized itinerary that captures the essence of Sri Lanka's southern coast, tailored to your dreams and designed for unforgettable memories.</p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn-primary">Start Planning</a>
                    <a href="travel-tips.php" class="btn-secondary">Travel Tips</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Down South Paradise</h3>
                    <p>Discover the untamed beauty of Sri Lanka's southern coast, where golden beaches meet emerald hills and every moment creates unforgettable memories.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="destinations.php">Destinations</a></li>
                        <li><a href="activities.php">Activities</a></li>
                        <li><a href="travel-tips.php">Travel Tips</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Travel Services</h3>
                    <ul>
                        <li><a href="account.php">My Account</a></li>
                        <li><a href="bookings.php">My Bookings</a></li>
                        <li><a href="accommodations.php">Accommodations</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="privacy.php">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> Galle Road, Unawatuna, Sri Lanka</li>
                        <li><i class="fas fa-phone"></i> +94 77 123 4567</li>
                        <li><i class="fas fa-envelope"></i> info@downsouthparadise.lk</li>
                        <li><i class="fas fa-clock"></i> 24/7 Customer Support</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Down South Paradise. All rights reserved. | Sustainable Tourism | Responsible Travel</p>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>