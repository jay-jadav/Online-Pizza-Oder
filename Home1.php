<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SliceMaster - Order Pizza Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://placehold.co/1920x1080');
            background-size: cover;
            background-position: center;
            height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .pizza-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .topping-btn {
            transition: all 0.3s ease;
        }
        
        .topping-btn.active {
            background-color: #ef4444;
            color: white;
        }
        
        .cart-item {
            transition: all 0.3s ease;
        }
        
        .cart-item:hover {
            background-color: #f9f9f9;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
        
        .cart-open {
            animation: slideIn 0.3s forwards;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0 flex items-center">
                    <img src="https://placehold.co/50x50" alt="SliceMaster Pizza logo - A cartoon pizza slice with a chef hat" class="h-8">
                    <span class="ml-2 text-xl font-bold text-red-600">SliceMaster</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-4">
                        <a href="#" class="text-red-600 font-medium">Home</a>
                        <a href="#" class="text-gray-700 hover:text-red-600">Menu</a>
                        <a href="#" class="text-gray-700 hover:text-red-600">Deals</a>
                        <a href="#" class="text-gray-700 hover:text-red-600">About</a>
                        <a href="#" class="text-gray-700 hover:text-red-600">Contact</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <button id="cart-toggle" class="relative p-2 text-gray-700 hover:text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span id="cart-count" class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </button>
                    <button class="ml-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Login</button>
                    <button class="md:hidden ml-2 p-2 text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Hot & Fresh Pizza Delivered Fast</h1>
            <p class="text-xl md:text-2xl mb-8">Order online and get 20% off your first order!</p>
            <button class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-full text-lg font-bold animate-bounce">Order Now</button>
        </div>
    </section>

    <!-- Special Offers -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Today's Special Offers</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Offer 1 -->
                <div class="bg-red-50 rounded-lg overflow-hidden shadow-lg relative">
                    <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold">20% OFF</div>
                    <img src="https://placehold.co/600x400" alt="Family meal deal - 2 large pizzas with garlic bread and soda" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Family Feast</h3>
                        <p class="text-gray-600 mb-4">2 Large Pizzas + Garlic Bread + 1.5L Soda</p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400 line-through">$29.99</span>
                            <span class="text-red-600 font-bold text-xl">$23.99</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Add to Cart</button>
                        </div>
                    </div>
                </div>
                
                <!-- Offer 2 -->
                <div class="bg-red-50 rounded-lg overflow-hidden shadow-lg relative">
                    <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold">COMBO</div>
                    <img src="https://placehold.co/600x400" alt="Lunch special - 1 medium pizza with salad and drink" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Lunch Special</h3>
                        <p class="text-gray-600 mb-4">1 Medium Pizza + Side Salad + Drink</p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Only</span>
                            <span class="text-red-600 font-bold text-xl">$12.99</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Add to Cart</button>
                        </div>
                    </div>
                </div>
                
                <!-- Offer 3 -->
                <div class="bg-red-50 rounded-lg overflow-hidden shadow-lg relative">
                    <div class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-bold">NEW</div>
                    <img src="https://placehold.co/600x400" alt="Vegetarian special pizza with fresh toppings" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Veggie Delight</h3>
                        <p class="text-gray-600 mb-4">Vegetarian Pizza with Premium Toppings</p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400 line-through">$18.99</span>
                            <span class="text-red-600 font-bold text-xl">$15.99</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pizza Menu -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Our Signature Pizzas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Pizza 1 -->
                <div class="bg-white pizza-card rounded-lg overflow-hidden shadow-lg transition-all duration-300">
                    <img src="https://placehold.co/600x400" alt="Pepperoni pizza with extra cheese and crispy edges" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-bold">Classic Pepperoni</h3>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Bestseller</span>
                        </div>
                        <p class="text-gray-600 mt-2 mb-4">Spicy pepperoni with extra mozzarella cheese</p>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold text-xl">$14.99</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Customize</button>
                        </div>
                    </div>
                </div>
                
                <!-- Pizza 2 -->
                <div class="bg-white pizza-card rounded-lg overflow-hidden shadow-lg transition-all duration-300">
                    <img src="https://placehold.co/600x400" alt="Hawaiian pizza with pineapple chunks and ham" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold">Hawaiian Paradise</h3>
                        <p class="text-gray-600 mt-2 mb-4">Sweet pineapple with smoked ham</p>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold text-xl">$16.99</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Customize</button>
                        </div>
                    </div>
                </div>
                
                <!-- Pizza 3 -->
                <div class="bg-white pizza-card rounded-lg overflow-hidden shadow-lg transition-all duration-300">
                    <img src="https://placehold.co/600x400" alt="BBQ chicken pizza with red onions and cilantro" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-bold">BBQ Chicken</h3>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Popular</span>
                        </div>
                        <p class="text-gray-600 mt-2 mb-4">Grilled chicken with tangy BBQ sauce</p>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold text-xl">$17.99</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Customize</button>
                        </div>
                    </div>
                </div>
                
                <!-- Pizza 4 -->
                <div class="bg-white pizza-card rounded-lg overflow-hidden shadow-lg transition-all duration-300">
                    <img src="https://placehold.co/600x400" alt="Four cheese pizza with mixed cheeses melting together" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold">Four Cheese</h3>
                        <p class="text-gray-600 mt-2 mb-4">Mozzarella, Parmesan, Cheddar & Gorgonzola</p>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold text-xl">$15.99</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Customize</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <button class="bg-white border-2 border-red-600 text-red-600 px-8 py-3 rounded-lg hover:bg-red-600 hover:text-white font-bold">View Full Menu</button>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-red-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Choose Your Pizza</h3>
                    <p class="text-gray-600">Select from our delicious menu or create your own custom pizza</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-red-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Pay Securely</h3>
                    <p class="text-gray-600">Quick and secure payment with multiple options</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-red-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Fast Delivery</h3>
                    <p class="text-gray-600">Hot and fresh pizza delivered to your door in 30 minutes or less</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12 bg-red-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white text-gray-800 rounded-lg p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://placehold.co/50x50" alt="Happy customer portrait" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <h4 class="font-bold">Alex Johnson</h4>
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                        </div>
                    </div>
                    <p>"The best pizza I've ever had! The crust is perfect and the toppings are always fresh."</p>
                </div>
                
                <div class="bg-white text-gray-800 rounded-lg p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://placehold.co/50x50" alt="Smiling customer portrait" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <h4 class="font-bold">Sarah Williams</h4>
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                        </div>
                    </div>
                    <p>"Fast delivery and amazing quality. My family orders every Friday night without fail!"</p>
                </div>
                
                <div class="bg-white text-gray-800 rounded-lg p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://placehold.co/50x50" alt="Satisfied customer portrait" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <h4 class="font-bold">Michael Chen</h4>
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                        </div>
                    </div>
                    <p>"Their vegetarian options are outstanding. Even my meat-loving friends enjoy them!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">SliceMaster</h3>
                    <p class="text-gray-400">Delivering hot and fresh pizza since 2010</p>
                    <div class="flex mt-4 space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Menu</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQs</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>123 Pizza Street, Foodville</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>(555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>info@slicemaster.com</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Opening Hours</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex justify-between">
                            <span>Monday - Thursday</span>
                            <span>11am - 11pm</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Friday - Saturday</span>
                            <span>11am - Midnight</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Sunday</span>
                            <span>12pm - 10pm</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2023 SliceMaster Pizza. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Shopping Cart Sidebar -->
    <div id="cart-sidebar" class="fixed top-0 right-0 w-full md:w-96 h-full bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300 overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Your Order</h2>
                <button id="close-cart" class="text-gray-500 hover:text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div id="cart-items" class="mb-8">
                <!-- Cart items will be dynamically inserted here -->
                <div class="text-center py-8 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p>Your cart is empty</p>
                </div>
            </div>
            
            <div class="border-t border-gray-200 pt-4">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Subtotal</span>
                    <span id="cart-subtotal" class="font-bold">$0.00</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Delivery Fee</span>
                    <span id="delivery-fee" class="font-bold">$2.99</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="text-gray-600">Tax</span>
                    <span id="tax" class="font-bold">$0.00</span>
                </div>
                <div class="flex justify-between text-xl font-bold mb-8">
                    <span>Total</span>
                    <span id="cart-total">$0.00</span>
                </div>
                
                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-4 rounded-lg font-bold">Checkout</button>
            </div>
        </div>
    </div>

    <script>
        // Cart functionality
        document.addEventListener('DOMContentLoaded', function() {
            const cartToggle = document.getElementById('cart-toggle');
            const closeCart = document.getElementById('close-cart');
            const cartSidebar = document.getElementById('cart-sidebar');
            
            let cartCount = 0;
            let cart = [];
            
            // Toggle cart visibility
            cartToggle.addEventListener('click', function() {
                cartSidebar.classList.remove('translate-x-full');
                cartSidebar.classList.add('cart-open');
            });
            
            closeCart.addEventListener('click', function() {
                cartSidebar.classList.remove('cart-open');
                cartSidebar.classList.add('translate-x-full');
            });
            
            // Sample data for pizza customization
            const pizzaSizes = [
                { name: 'Small', price: 10.99 },
                { name: 'Medium', price: 12.99 },
                { name: 'Large', price: 14.99 },
                { name: 'Extra Large', price: 17.99 }
            ];
            
            const toppings = [
                { name: 'Pepperoni', price: 1.5 },
                { name: 'Mushrooms', price: 1 },
                { name: 'Onions', price: 1 },
                { name: 'Sausage', price: 2 },
                { name: 'Bacon', price: 2 },
                { name: 'Extra Cheese', price: 1.5 },
                { name: 'Black Olives', price: 1 },
                { name: 'Green Peppers', price: 1 }
            ];
            
            // Sample function to add to cart
            function addToCart(name, price, customization = {}) {
                cartCount++;
                document.getElementById('cart-count').textContent = cartCount;
                
                const item = {
                    id: Date.now(),
                    name,
                    price,
                    customization
                };
                
                cart.push(item);
                updateCartDisplay();
            }
            
            // Update cart display
            function updateCartDisplay() {
                const cartItemsContainer = document.getElementById('cart-items');
                
                if (cart.length === 0) {
                    cartItemsContainer.innerHTML = `
                        <div class="text-center py-8 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <p>Your cart is empty</p>
                        </div>
                    `;
                    
                    document.getElementById('cart-subtotal').textContent = '$0.00';
                    document.getElementById('cart-total').textContent = '$0.00';
                    document.getElementById('tax').textContent = '$0.00';
                    return;
                }
                
                let subtotal = 0;
                let cartItemsHTML = '';
                
                cart.forEach(item => {
                    subtotal += item.price;
                    
                    cartItemsHTML += `
                        <div class="cart-item flex justify-between items-center py-4 border-b border-gray-100">
                            <div>
                                <h4 class="font-medium">${item.name}</h4>
                                <p class="text-gray-500 text-sm">${item.customization.size || 'Medium'}</p>
                            </div>
                            <div class="flex items-center">
                                <span class="font-medium mr-4">$${item.price.toFixed(2)}</span>
                                <button class="text-red-600 hover:text-red-700" onclick="removeFromCart(${item.id})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    `;
                });
                
                const deliveryFee = 2.99;
                const tax = subtotal * 0.08;
                const total = subtotal + deliveryFee + tax;
                
                document.getElementById('cart-items').innerHTML = cartItemsHTML;
                document.getElementById('cart-subtotal').textContent = `$${subtotal.toFixed(2)}`;
                document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
                document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;
            }
            
            // Sample function to remove from cart
            window.removeFromCart = function(id) {
                cart = cart.filter(item => item.id !== id);
                cartCount--;
                document.getElementById('cart-count').textContent = cartCount;
                updateCartDisplay();
            };
            
            // Sample function to handle pizza customization
            function customizePizza(name, basePrice) {
                // This would open a modal with customization options
                console.log(`Customizing ${name} pizza`);
            }
            
            // Attach event listeners to "Add to Cart" buttons
            document.querySelectorAll('button').forEach(button => {
                if (button.textContent.includes('Add to Cart')) {
                    button.addEventListener('click', function() {
                        const card = this.closest('.bg-red-50');
                        const name = card.querySelector('h3').textContent;
                        const priceText = card.querySelector('.text-xl').textContent.replace('$', '');
                        const price = parseFloat(priceText);
                        
                        addToCart(name, price, {});
                        
                        // Show feedback animation
                        const animation = document.createElement('div');
                        animation.className = 'fixed top-20 right-4 bg-green-500 text-white px-4 py-2 rounded-lg animate-bounce';
                        animation.textContent = 'Added to cart!';
                        document.body.appendChild(animation);
                        
                        setTimeout(() => {
                            animation.remove();
                        }, 2000);
                    });
                }
                
                if (button.textContent.includes('Customize')) {
                    button.addEventListener('click', function() {
                        const card = this.closest('.pizza-card');
                        const name = card.querySelector('h3').textContent;
                        const priceText = card.querySelector('.text-xl').textContent.replace('$', '');
                        const price = parseFloat(priceText);
                        
                        // In a real app, this would open a customization modal
                        addToCart(`Custom ${name}`, price + 2, { size: 'Medium', toppings: ['Extra Cheese'] });
                        
                        // Show feedback animation
                        const animation = document.createElement('div');
                        animation.className = 'fixed top-20 right-4 bg-green-500 text-white px-4 py-2 rounded-lg animate-bounce';
                        animation.textContent = 'Custom pizza added!';
                        document.body.appendChild(animation);
                        
                        setTimeout(() => {
                            animation.remove();
                        }, 2000);
                    });
                }
            });
            
            // Initialize cart display
            updateCartDisplay();
        });
    </script>
</body>
</html>
