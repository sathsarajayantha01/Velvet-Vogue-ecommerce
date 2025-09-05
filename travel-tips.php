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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Tips - Sri Lanka's Down South Paradise</title>
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
                    <li><a href="destinations.php">Destinations</a></li>
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="travel-tips.php" class="active">Travel Tips</a></li>
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
            <h1>Travel Smart, Travel Sustainably</h1>
            <p>Essential tips for making the most of your Sri Lankan adventure while respecting our precious environment and local communities</p>
        </div>
    </section>

    <!-- Travel Tips Content -->
    <section class="travel-tips">
        <div class="container">
            <div class="tips-grid">
                <!-- Best Time to Visit -->
                <div class="tip-category">
                    <div class="tip-header">
                        <i class="fas fa-calendar-alt"></i>
                        <h2>Best Time to Visit</h2>
                    </div>
                    <div class="tip-content">
                        <h3>Seasonal Paradise</h3>
                        <p>Sri Lanka's southern coast enjoys tropical weather year-round, but timing can enhance your experience:</p>
                        
                        <div class="season-info">
                            <h4><i class="fas fa-sun"></i> Dry Season (December - March)</h4>
                            <ul>
                                <li>Perfect beach weather with minimal rainfall</li>
                                <li>Ideal for whale watching (November - April)</li>
                                <li>Best surfing conditions</li>
                                <li>Peak tourist season - book accommodations early</li>
                            </ul>
                        </div>
                        
                        <div class="season-info">
                            <h4><i class="fas fa-cloud-rain"></i> Monsoon Season (May - September)</h4>
                            <ul>
                                <li>Dramatic afternoon showers followed by clear skies</li>
                                <li>Fewer crowds, better prices</li>
                                <li>Lush green landscapes</li>
                                <li>Perfect for cultural experiences and indoor activities</li>
                            </ul>
                        </div>

                        <div class="pro-tip">
                            <i class="fas fa-lightbulb"></i>
                            <p><strong>Pro Tip:</strong> Even during monsoon season, mornings are usually sunny. Plan outdoor activities early in the day!</p>
                        </div>
                    </div>
                </div>

                <!-- What to Pack -->
                <div class="tip-category">
                    <div class="tip-header">
                        <i class="fas fa-suitcase"></i>
                        <h2>What to Pack</h2>
                    </div>
                    <div class="tip-content">
                        <h3>Essential Items for Paradise</h3>
                        
                        <div class="pack-category">
                            <h4><i class="fas fa-tshirt"></i> Clothing</h4>
                            <ul>
                                <li>Light, breathable cotton clothing</li>
                                <li>Swimwear and cover-ups</li>
                                <li>Light jacket for air-conditioned spaces</li>
                                <li>Modest clothing for temple visits</li>
                                <li>Comfortable walking shoes</li>
                                <li>Flip-flops or sandals</li>
                            </ul>
                        </div>

                        <div class="pack-category">
                            <h4><i class="fas fa-shield-alt"></i> Sun Protection</h4>
                            <ul>
                                <li>High SPF sunscreen (reef-safe preferred)</li>
                                <li>Wide-brimmed hat</li>
                                <li>UV-protection sunglasses</li>
                                <li>Light long-sleeved shirt for extra protection</li>
                            </ul>
                        </div>

                        <div class="pack-category">
                            <h4><i class="fas fa-first-aid"></i> Health & Safety</h4>
                            <ul>
                                <li>Insect repellent</li>
                                <li>Basic first aid kit</li>
                                <li>Personal medications</li>
                                <li>Water purification tablets (for rural areas)</li>
                                <li>Waterproof phone case</li>
                            </ul>
                        </div>

                        <div class="pro-tip">
                            <i class="fas fa-lightbulb"></i>
                            <p><strong>Eco Tip:</strong> Bring a reusable water bottle and shopping bag to reduce plastic waste!</p>
                        </div>
                    </div>
                </div>

                <!-- Transportation -->
                <div class="tip-category">
                    <div class="tip-header">
                        <i class="fas fa-bus"></i>
                        <h2>Getting Around</h2>
                    </div>
                    <div class="tip-content">
                        <h3>Transportation Options</h3>
                        
                        <div class="transport-option">
                            <h4><i class="fas fa-taxi"></i> Tuk-tuks (Three-wheelers)</h4>
                            <p>The quintessential Sri Lankan experience! Always negotiate the fare before starting your journey. Perfect for short distances and local exploration.</p>
                            <p><strong>Average cost:</strong> LKR 100-300 for short trips</p>
                        </div>

                        <div class="transport-option">
                            <h4><i class="fas fa-car"></i> Private Car/Driver</h4>
                            <p>Recommended for longer distances and day trips. Many drivers speak English and can serve as informal guides.</p>
                            <p><strong>Average cost:</strong> LKR 8,000-12,000 per day</p>
                        </div>

                        <div class="transport-option">
                            <h4><i class="fas fa-bus"></i> Local Buses</h4>
                            <p>An authentic local experience and budget-friendly option. Can be crowded but offers insight into daily Sri Lankan life.</p>
                            <p><strong>Average cost:</strong> LKR 20-100 depending on distance</p>
                        </div>

                        <div class="transport-option">
                            <h4><i class="fas fa-train"></i> Train Travel</h4>
                            <p>Scenic coastal train route from Colombo to Galle offers breathtaking ocean views. Book reserved seats for comfort.</p>
                            <p><strong>Average cost:</strong> LKR 180-600 depending on class</p>
                        </div>

                        <div class="pro-tip">
                            <i class="fas fa-lightbulb"></i>
                            <p><strong>Safety Tip:</strong> Download PickMe app for reliable taxi service with fixed rates!</p>
                        </div>
                    </div>
                </div>

                <!-- Cultural Etiquette -->
                <div class="tip-category">
                    <div class="tip-header">
                        <i class="fas fa-hands"></i>
                        <h2>Cultural Etiquette</h2>
                    </div>
                    <div class="tip-content">
                        <h3>Respect Local Customs</h3>
                        
                        <div class="etiquette-section">
                            <h4><i class="fas fa-pray"></i> Temple Visits</h4>
                            <ul>
                                <li>Remove shoes before entering temple grounds</li>
                                <li>Cover shoulders and knees (sarongs available for rent)</li>
                                <li>Don't turn your back to Buddha statues</li>
                                <li>Don't point with your finger - use an open palm</li>
                                <li>Photography rules vary - ask permission first</li>
                            </ul>
                        </div>

                        <div class="etiquette-section">
                            <h4><i class="fas fa-handshake"></i> Social Interactions</h4>
                            <ul>
                                <li>Use your right hand for giving and receiving</li>
                                <li>Slight bow with palms together (similar to prayer position) is a respectful greeting</li>
                                <li>Avoid public displays of affection</li>
                                <li>Remove hats when entering homes or temples</li>
                                <li>Learn a few words in Sinhala - locals appreciate the effort!</li>
                            </ul>
                        </div>

                        <div class="useful-phrases">
                            <h4><i class="fas fa-comments"></i> Useful Phrases</h4>
                            <ul>
                                <li><strong>Hello:</strong> Ayubowan (ah-yu-bo-wan)</li>
                                <li><strong>Thank you:</strong> Istuti (is-tu-ti)</li>
                                <li><strong>Goodbye:</strong> Gihilla enawa (gi-hi-lla e-na-wa)</li>
                                <li><strong>Delicious:</strong> Rasa (ra-sa)</li>
                                <li><strong>How much?:</strong> Kiyada? (ki-ya-da)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Money & Costs -->
                <div class="tip-category">
                    <div class="tip-header">
                        <i class="fas fa-money-bill-wave"></i>
                        <h2>Money Matters</h2>
                    </div>
                    <div class="tip-content">
                        <h3>Currency & Budgeting</h3>
                        
                        <div class="money-info">
                            <h4><i class="fas fa-coins"></i> Currency</h4>
                            <p>Sri Lankan Rupee (LKR). US Dollars are widely accepted at tourist establishments, but you'll get better rates with local currency.</p>
                        </div>

                        <div class="budget-guide">
                            <h4><i class="fas fa-calculator"></i> Daily Budget Guide (per person)</h4>
                            <div class="budget-tier">
                                <h5>Budget Traveler: $25-40 USD</h5>
                                <ul>
                                    <li>Guesthouse accommodation: $10-15</li>
                                    <li>Local meals: $5-10</li>
                                    <li>Local transport: $5-10</li>
                                    <li>Activities: $5-10</li>
                                </ul>
                            </div>
                            
                            <div class="budget-tier">
                                <h5>Mid-Range Traveler: $50-100 USD</h5>
                                <ul>
                                    <li>Hotel accommodation: $25-50</li>
                                    <li>Restaurant meals: $10-20</li>
                                    <li>Private transport: $15-25</li>
                                    <li>Tours & activities: $15-30</li>
                                </ul>
                            </div>
                            
                            <div class="budget-tier">
                                <h5>Luxury Traveler: $150+ USD</h5>
                                <ul>
                                    <li>Resort accommodation: $80+</li>
                                    <li>Fine dining: $30+</li>
                                    <li>Private driver/guide: $40+</li>
                                    <li>Premium experiences: $50+</li>
                                </ul>
                            </div>
                        </div>

                        <div class="pro-tip">
                            <i class="fas fa-lightbulb"></i>
                            <p><strong>Money Tip:</strong> ATMs are widely available, but notify your bank before travel and carry some cash for small vendors!</p>
                        </div>
                    </div>
                </div>

                <!-- Sustainable Tourism -->
                <div class="tip-category">
                    <div class="tip-header">
                        <i class="fas fa-leaf"></i>
                        <h2>Sustainable Tourism</h2>
                    </div>
                    <div class="tip-content">
                        <h3>Protecting Paradise Together</h3>
                        
                        <div class="sustainability-section">
                            <h4><i class="fas fa-water"></i> Ocean Conservation</h4>
                            <ul>
                                <li>Use reef-safe sunscreen to protect coral reefs</li>
                                <li>Don't touch or stand on coral while snorkeling</li>
                                <li>Avoid single-use plastics - bring reusable water bottles</li>
                                <li>Participate in beach clean-ups when available</li>
                                <li>Maintain respectful distance from marine wildlife</li>
                            </ul>
                        </div>

                        <div class="sustainability-section">
                            <h4><i class="fas fa-home"></i> Supporting Local Communities</h4>
                            <ul>
                                <li>Choose locally-owned accommodations and restaurants</li>
                                <li>Buy handicrafts directly from artisans</li>
                                <li>Hire local guides for authentic experiences</li>
                                <li>Respect local customs and traditions</li>
                                <li>Learn about local conservation efforts</li>
                            </ul>
                        </div>

                        <div class="sustainability-section">
                            <h4><i class="fas fa-paw"></i> Wildlife Respect</h4>
                            <ul>
                                <li>Keep safe distances from all wildlife</li>
                                <li>Don't feed wild animals</li>
                                <li>Choose ethical wildlife experiences</li>
                                <li>Report wildlife harassment to authorities</li>
                                <li>Follow your guide's instructions during safaris</li>
                            </ul>
                        </div>

                        <div class="pro-tip">
                            <i class="fas fa-heart"></i>
                            <p><strong>Paradise Promise:</strong> By traveling responsibly, you help preserve this beautiful coast for future generations!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Information -->
    <section class="emergency-info">
        <div class="container">
            <h2><i class="fas fa-exclamation-triangle"></i> Emergency Information</h2>
            <div class="emergency-grid">
                <div class="emergency-card">
                    <h3>Emergency Numbers</h3>
                    <ul>
                        <li><strong>Police:</strong> 119</li>
                        <li><strong>Fire & Ambulance:</strong> 110</li>
                        <li><strong>Tourist Police:</strong> 1912</li>
                        <li><strong>Tourist Hotline:</strong> 1912</li>
                    </ul>
                </div>
                <div class="emergency-card">
                    <h3>Medical Facilities</h3>
                    <ul>
                        <li>Karapitiya Hospital, Galle</li>
                        <li>Matara General Hospital</li>
                        <li>Private clinics in major towns</li>
                        <li>Pharmacies widely available</li>
                    </ul>
                </div>
                <div class="emergency-card">
                    <h3>Important Contacts</h3>
                    <ul>
                        <li><strong>Your Embassy</strong></li>
                        <li><strong>Travel Insurance Provider</strong></li>
                        <li><strong>Hotel/Accommodation</strong></li>
                        <li><strong>Down South Paradise:</strong> +94 77 123 4567</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="tips-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready for Your Adventure?</h2>
                <p>Armed with these essential tips, you're ready to explore Sri Lanka's Down South Paradise responsibly and memorably. Let us help you plan the perfect sustainable journey!</p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn-primary">Plan Your Trip</a>
                    <a href="destinations.php" class="btn-secondary">Explore Destinations</a>
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