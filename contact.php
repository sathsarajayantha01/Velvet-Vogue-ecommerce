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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sri Lanka's Down South Paradise</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/contact.css">
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
                    <li><a href="travel-tips.php">Travel Tips</a></li>
                    <li><a href="cultural-heritage.php">Cultural Heritage</a></li>
                    <li><a href="accommodations.php">Stay</a></li>
                    <li><a href="contact.php" class="active">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="section-title">
                <h1>Let's Plan Your Paradise Adventure</h1>
                <p>Ready to explore Sri Lanka's Down South Paradise? Our friendly local experts are here to help you create unforgettable memories. Reach out for personalized travel planning, booking assistance, or any questions about your upcoming journey!</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Our Office</h3>
                            <p>Galle Road, Unawatuna</p>
                            <p>Southern Province</p>
                            <p>Sri Lanka</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Phone</h3>
                            <p>Travel Planning: +94 77 123 4567</p>
                            <p>Bookings: +94 77 123 4568</p>
                            <p>Emergency Hotline: +94 77 123 4569</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Email</h3>
                            <p>General Inquiries: info@downsouthparadise.lk</p>
                            <p>Bookings: bookings@downsouthparadise.lk</p>
                            <p>Groups & Events: groups@downsouthparadise.lk</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Service Hours</h3>
                            <p>Monday - Friday: 8:00 AM - 8:00 PM</p>
                            <p>Saturday - Sunday: 8:00 AM - 6:00 PM</p>
                            <p>Emergency Support: 24/7</p>
                        </div>
                    </div>
                    
                    <div class="social-media-contact">
                        <h3>Follow Our Journey</h3>
                        <div class="social-links">
                            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-container">
                    <div class="contact-form-wrapper">
                        <h2>Start Planning Your Adventure</h2>
                        <form id="contact-form" method="post" action="contact_process.php" novalidate>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="inquiry_type">Type of Inquiry</label>
                                    <select id="inquiry_type" name="inquiry_type" required>
                                        <option value="">Select inquiry type</option>
                                        <option value="general">General Information</option>
                                        <option value="booking">Booking Assistance</option>
                                        <option value="itinerary">Custom Itinerary</option>
                                        <option value="group">Group Bookings</option>
                                        <option value="accommodation">Accommodation</option>
                                        <option value="activities">Activities & Tours</option>
                                        <option value="transport">Transportation</option>
                                        <option value="emergency">Emergency Support</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="travel_dates">Preferred Travel Dates</label>
                                    <input type="text" id="travel_dates" name="travel_dates" placeholder="e.g., December 2024 or Flexible">
                                </div>
                                <div class="form-group">
                                    <label for="group_size">Group Size</label>
                                    <select id="group_size" name="group_size">
                                        <option value="">Select group size</option>
                                        <option value="1">Solo Traveler</option>
                                        <option value="2">Couple</option>
                                        <option value="3-5">Small Group (3-5)</option>
                                        <option value="6-10">Medium Group (6-10)</option>
                                        <option value="10+">Large Group (10+)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="interests">Interests & Preferences</label>
                                <div class="checkbox-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interests[]" value="beaches"> Beach Relaxation
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interests[]" value="wildlife"> Wildlife Safari
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interests[]" value="surfing"> Surfing
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interests[]" value="whale-watching"> Whale Watching
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interests[]" value="culture"> Cultural Experiences
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interests[]" value="adventure"> Adventure Activities
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interests[]" value="cuisine"> Local Cuisine
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interests[]" value="wellness"> Wellness & Spa
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Tell us about your dream trip</label>
                                <textarea id="message" name="message" rows="6" placeholder="Share your travel dreams, specific requirements, budget considerations, or any questions you have about exploring Sri Lanka's Down South Paradise..." required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-primary">Send My Inquiry</button>
                            </div>
                            <div id="form-message" class="form-message"></div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="location-map">
                <h2>Find Us in Paradise</h2>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.1234567890123!2d80.24700001234567!3d6.01234567890123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae173bb6932d7e3%3A0x1e1234567890abcd!2sUnawatuna%20Beach%2C%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1650000000000!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs Section -->
    <section class="faqs-section">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Find answers to commonly asked questions about visiting Sri Lanka's Down South Paradise.</p>
            </div>
            
            <div class="faqs-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What's the best time to visit Sri Lanka's southern coast?</h3>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>The best time to visit is during the dry season from December to March, offering perfect beach weather and ideal conditions for whale watching. However, the south coast can be enjoyed year-round, with the monsoon season (May-September) offering lush landscapes and fewer crowds.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do I need a visa to visit Sri Lanka?</h3>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Most visitors need an Electronic Travel Authorization (ETA) which can be obtained online before travel. The ETA is valid for 30 days for tourists. Some nationalities may be eligible for visa-free entry. We recommend checking with the Sri Lankan embassy or consulate in your country for the most current requirements.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What currency is used and should I bring cash?</h3>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>The currency is Sri Lankan Rupee (LKR). ATMs are widely available in tourist areas, and most hotels and restaurants accept credit cards. However, it's advisable to carry some cash for small vendors, tuk-tuk rides, and local markets. US Dollars are also widely accepted at tourist establishments.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Is it safe to drink tap water?</h3>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>We recommend drinking bottled water or filtered water. Most hotels and restaurants provide safe drinking water. Bring a reusable water bottle that you can refill with filtered water to reduce plastic waste and stay hydrated in the tropical climate.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What should I pack for my trip?</h3>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Pack light, breathable clothing, swimwear, sun protection (high SPF sunscreen, hat, sunglasses), comfortable walking shoes, flip-flops, and modest clothing for temple visits. Don't forget insect repellent, a first aid kit, and any personal medications. A light jacket for air-conditioned spaces is also useful.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can you help arrange transportation and accommodations?</h3>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We offer comprehensive travel planning services including accommodation bookings, private transportation arrangements, guided tours, and custom itineraries. Our local expertise ensures you get the best value and authentic experiences. Contact us with your preferences and we'll handle all the details.</p>
                    </div>
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
                        <li><a href="accommodations.php">Accommodations</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="privacy.php">Privacy Policy</a></li>
                        <li><a href="terms.php">Terms & Conditions</a></li>
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
    <script>
        // FAQ toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');
                
                question.addEventListener('click', function() {
                    // Toggle active class on the FAQ item
                    item.classList.toggle('active');
                    
                    // Toggle visibility of the answer
                    if (item.classList.contains('active')) {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                    } else {
                        answer.style.maxHeight = '0';
                    }
                });
            });
            
            // Form validation
            const contactForm = document.getElementById('contact-form');
            const formMessage = document.getElementById('form-message');
            
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    let isValid = true;
                    const name = document.getElementById('name');
                    const email = document.getElementById('email');
                    const subject = document.getElementById('subject');
                    const message = document.getElementById('message');
                    
                    // Simple validation
                    if (!name.value.trim()) {
                        isValid = false;
                        name.classList.add('error');
                    } else {
                        name.classList.remove('error');
                    }
                    
                    if (!email.value.trim() || !email.value.includes('@')) {
                        isValid = false;
                        email.classList.add('error');
                    } else {
                        email.classList.remove('error');
                    }
                    
                    if (!subject.value.trim()) {
                        isValid = false;
                        subject.classList.add('error');
                    } else {
                        subject.classList.remove('error');
                    }
                    
                    if (!message.value.trim()) {
                        isValid = false;
                        message.classList.add('error');
                    } else {
                        message.classList.remove('error');
                    }
                    
                    if (!isValid) {
                        e.preventDefault();
                        formMessage.textContent = 'Please fill in all required fields correctly.';
                        formMessage.classList.add('error');
                    }
                });
            }
        });
    </script>
</body>
</html>