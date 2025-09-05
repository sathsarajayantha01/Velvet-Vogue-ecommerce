<?php
// Include database connection
require_once 'config.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']) && isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

// Get user data if logged in
$userData = [];
if($isLoggedIn) {
    $userData = [
        'username' => $_SESSION['username'] ?? '',
        'first_name' => $_SESSION['first_name'] ?? '',
        'last_name' => $_SESSION['last_name'] ?? '',
        'email' => $_SESSION['email'] ?? '',
        'role' => $_SESSION['role'] ?? 'customer'
    ];
}

// Get cart count from session
$cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

// Function to get featured products
function getFeaturedProducts($conn, $limit = 4) {
    $products = [];
    $sql = "SELECT * FROM products WHERE featured = 1 AND status = 'active' LIMIT ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    
    $stmt->close();
    return $products;
}

// Function to get new arrivals
function getNewArrivals($conn, $limit = 4) {
    $products = [];
    $sql = "SELECT * FROM products WHERE new_arrival = 1 AND status = 'active' ORDER BY created_at DESC LIMIT ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    
    $stmt->close();
    return $products;
}

// Get featured products and new arrivals
$featuredProducts = getFeaturedProducts($conn);
$newArrivals = getNewArrivals($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sri Lanka's Down South Paradise - Discover Untamed Beauty</title>
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
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="destinations.php">Destinations</a></li>
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="travel-tips.php">Travel Tips</a></li>
                    <li><a href="cultural-heritage.php">Cultural Heritage</a></li>
                    <li><a href="accommodations.php">Stay</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero Banner Section -->
    <section class="hero-banner">
        <div class="container">
            <div class="banner-content">
                <h2>Welcome to Sri Lanka's Down South Paradise</h2>
                <p>Where emerald waves kiss golden shores and ancient traditions dance with tropical winds. Discover the untamed beauty of Sri Lanka's southern coast, where every sunset paints a new story and every tide brings adventure to your doorstep.</p>
                <a href="destinations.php" class="btn-primary">Explore Paradise</a>
            </div>
        </div>
    </section>

    <!-- Featured Destinations Section -->
    <section class="featured-destinations">
        <div class="container">
            <div class="section-title">
                <h2>Featured Destinations</h2>
                <p>Discover the crown jewels of Sri Lanka's southern coast</p>
            </div>
            <div class="destination-grid">
                <div class="destination-card">
                    <div class="destination-image">
                        <a href="destinations.php?location=unawatuna">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400" alt="Unawatuna Beach">
                        </a>
                        <div class="destination-tag featured">Featured</div>
                        <div class="destination-actions">
                            <button class="quick-view" data-destination="unawatuna">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                            <button class="add-to-wishlist" data-destination="unawatuna">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="destination-info">
                        <h3 class="destination-title">
                            <a href="destinations.php?location=unawatuna">Unawatuna Beach</a>
                        </h3>
                        <p class="destination-description">A crescent-shaped golden paradise where azure waters meet swaying coconut palms, perfect for swimming and watching spectacular sunsets.</p>
                        <div class="destination-features">
                            <span class="feature-tag">Swimming</span>
                            <span class="feature-tag">Sunset Views</span>
                            <span class="feature-tag">Restaurants</span>
                        </div>
                        <a href="destinations.php?location=unawatuna" class="explore-btn">
                            Explore Destination
                        </a>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="destination-image">
                        <a href="destinations.php?location=mirissa">
                            <img src="https://images.unsplash.com/photo-1582719494734-4b37e61f5c4c?w=400" alt="Mirissa Beach">
                        </a>
                        <div class="destination-tag featured">Featured</div>
                        <div class="destination-actions">
                            <button class="quick-view" data-destination="mirissa">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                            <button class="add-to-wishlist" data-destination="mirissa">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="destination-info">
                        <h3 class="destination-title">
                            <a href="destinations.php?location=mirissa">Mirissa</a>
                        </h3>
                        <p class="destination-description">The crown jewel for whale watching, where majestic blue whales dance in crystal waters just a boat ride away from pristine beaches.</p>
                        <div class="destination-features">
                            <span class="feature-tag">Whale Watching</span>
                            <span class="feature-tag">Surfing</span>
                            <span class="feature-tag">Nightlife</span>
                        </div>
                        <a href="destinations.php?location=mirissa" class="explore-btn">
                            Explore Destination
                        </a>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="destination-image">
                        <a href="destinations.php?location=weligama">
                            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400" alt="Weligama Stilt Fishermen">
                        </a>
                        <div class="destination-tag featured">Featured</div>
                        <div class="destination-actions">
                            <button class="quick-view" data-destination="weligama">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                            <button class="add-to-wishlist" data-destination="weligama">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="destination-info">
                        <h3 class="destination-title">
                            <a href="destinations.php?location=weligama">Weligama</a>
                        </h3>
                        <p class="destination-description">Home to the iconic stilt fishermen and world-class surf breaks, where ancient traditions meet modern adventure in perfect harmony.</p>
                        <div class="destination-features">
                            <span class="feature-tag">Stilt Fishing</span>
                            <span class="feature-tag">Surfing</span>
                            <span class="feature-tag">Culture</span>
                        </div>
                        <a href="destinations.php?location=weligama" class="explore-btn">
                            Explore Destination
                        </a>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="destination-image">
                        <a href="destinations.php?location=yala">
                            <img src="https://images.unsplash.com/photo-1564760055775-d63b17a55c44?w=400" alt="Yala National Park">
                        </a>
                        <div class="destination-tag featured">Featured</div>
                        <div class="destination-actions">
                            <button class="quick-view" data-destination="yala">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                            <button class="add-to-wishlist" data-destination="yala">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="destination-info">
                        <h3 class="destination-title">
                            <a href="destinations.php?location=yala">Yala National Park</a>
                        </h3>
                        <p class="destination-description">A wildlife wonderland where majestic leopards roam free and elephants wander through ancient landscapes filled with exotic birds and untamed beauty.</p>
                        <div class="destination-features">
                            <span class="feature-tag">Safari</span>
                            <span class="feature-tag">Leopards</span>
                            <span class="feature-tag">Wildlife</span>
                        </div>
                        <a href="destinations.php?location=yala" class="explore-btn">
                            Explore Destination
                        </a>
                    </div>
                </div>
            </div>
            <div class="view-more">
                <a href="destinations.php" class="btn-secondary">Discover All Destinations</a>
            </div>
        </div>
    </section>

    <!-- Experiences Section -->
    <section class="experiences">
        <div class="container">
            <div class="section-title">
                <h2>Authentic Experiences</h2>
                <p>Immerse yourself in the soul of Sri Lanka's southern coast</p>
            </div>
            <div class="experience-grid">
                <div class="experience-card">
                    <div class="experience-image">
                        <a href="activities.php?type=surfing">
                            <img src="https://images.unsplash.com/photo-1502680390469-be75c86b636f?w=400" alt="Surfing Lessons">
                        </a>
                        <div class="experience-tag new">Popular</div>
                        <div class="experience-actions">
                            <button class="quick-view" data-experience="surfing">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                            <button class="add-to-wishlist" data-experience="surfing">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="experience-info">
                        <h3 class="experience-title">
                            <a href="activities.php?type=surfing">Learn to Surf</a>
                        </h3>
                        <p class="experience-description">Ride the pristine waves of the Indian Ocean with expert local instructors who'll guide you from beginner to confident surfer.</p>
                        <div class="experience-features">
                            <span class="feature-tag">Beginner Friendly</span>
                            <span class="feature-tag">Equipment Included</span>
                        </div>
                        <a href="activities.php?type=surfing" class="book-btn">
                            Book Experience
                        </a>
                    </div>
                </div>

                <div class="experience-card">
                    <div class="experience-image">
                        <a href="activities.php?type=whale-watching">
                            <img src="https://images.unsplash.com/photo-1544551763-77ef2d0cfc6c?w=400" alt="Whale Watching">
                        </a>
                        <div class="experience-tag new">Popular</div>
                        <div class="experience-actions">
                            <button class="quick-view" data-experience="whale-watching">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                            <button class="add-to-wishlist" data-experience="whale-watching">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="experience-info">
                        <h3 class="experience-title">
                            <a href="activities.php?type=whale-watching">Whale Watching</a>
                        </h3>
                        <p class="experience-description">Witness the majestic blue whales and playful dolphins in their natural habitat, just off the coast of Mirissa.</p>
                        <div class="experience-features">
                            <span class="feature-tag">Blue Whales</span>
                            <span class="feature-tag">Seasonal Activity</span>
                        </div>
                        <a href="activities.php?type=whale-watching" class="book-btn">
                            Book Experience
                        </a>
                    </div>
                </div>

                <div class="experience-card">
                    <div class="experience-image">
                        <a href="activities.php?type=temple-tours">
                            <img src="https://images.unsplash.com/photo-1584464491033-06628f3a6b7b?w=400" alt="Temple Tours">
                        </a>
                        <div class="experience-tag new">Cultural</div>
                        <div class="experience-actions">
                            <button class="quick-view" data-experience="temple-tours">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                            <button class="add-to-wishlist" data-experience="temple-tours">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="experience-info">
                        <h3 class="experience-title">
                            <a href="activities.php?type=temple-tours">Temple & Heritage Tours</a>
                        </h3>
                        <p class="experience-description">Explore ancient Buddhist temples and Dutch colonial heritage sites that tell the fascinating story of this cultural crossroads.</p>
                        <div class="experience-features">
                            <span class="feature-tag">Cultural Heritage</span>
                            <span class="feature-tag">Guided Tours</span>
                        </div>
                        <a href="activities.php?type=temple-tours" class="book-btn">
                            Book Experience
                        </a>
                    </div>
                </div>

                <div class="experience-card">
                    <div class="experience-image">
                        <a href="activities.php?type=local-cuisine">
                            <img src="https://images.unsplash.com/photo-1606491956689-2ea866880c84?w=400" alt="Local Cuisine">
                        </a>
                        <div class="experience-tag new">Tasty</div>
                        <div class="experience-actions">
                            <button class="quick-view" data-experience="local-cuisine">
                                <i class="fas fa-eye"></i> Quick View
                            </button>
                            <button class="add-to-wishlist" data-experience="local-cuisine">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="experience-info">
                        <h3 class="experience-title">
                            <a href="activities.php?type=local-cuisine">Culinary Adventures</a>
                        </h3>
                        <p class="experience-description">Savor authentic Sri Lankan flavors with cooking classes and food tours featuring fresh seafood and aromatic spices.</p>
                        <div class="experience-features">
                            <span class="feature-tag">Cooking Classes</span>
                            <span class="feature-tag">Fresh Seafood</span>
                        </div>
                        <a href="activities.php?type=local-cuisine" class="book-btn">
                            Book Experience
                        </a>
                    </div>
                </div>
            </div>
            <div class="view-more">
                <a href="activities.php" class="btn-secondary">View All Experiences</a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h2>Stay Connected to Paradise</h2>
                <p>Get exclusive travel tips, hidden gems, and special offers delivered to your inbox. Join our community of paradise seekers!</p>
                <form id="newsletter-form" action="subscribe.php" method="post">
                    <input type="email" name="email" placeholder="Your email address" required>
                    <button type="submit" class="btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Down South Paradise</h3>
                    <p>Discover the untamed beauty of Sri Lanka's southern coast, where golden beaches meet emerald hills and every moment creates unforgettable memories. Experience authentic hospitality and sustainable tourism at its finest.</p>
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
    <script src="js/cart.js"></script>
</body>
</html>