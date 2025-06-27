<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PF Gym & Fitness - Login</title>
    @vite(['resources/css/login.css', 'resources/js/login.js'])
    <script>
    tailwind.config = {
        theme: {
        extend: {
            colors: {
            primaryRed: '#F00000',
            highlightYellow: '#F7BB0E',
            darkBg: '#29282C',
            white: '#FFFFFF'
            }
        }
        }
    }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body class="min-h-screen flex items-center justify-center px-4">
    <div class="gym-bg"></div>
    <div class="gym-overlay"></div>

    <!-- Decorative Elements -->
    <svg class="fitness-icon top-20 left-20 w-64 h-64" viewBox="0 0 24 24" fill="yellow">
        <path d="M20.57 14.86L22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14 4.14 5.57 2 7.71 3.43 9.14 2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22 14.86 20.57 16.29 22 18.43 19.86 19.86 21.29 21.29 19.86 19.86 18.43 22 16.29 20.57 14.86z"/>
    </svg>

    <svg class="fitness-icon bottom-20 right-20 w-72 h-72" viewBox="0 0 24 24" fill="yellow">
        <path d="M20.57 14.86L22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14 4.14 5.57 2 7.71 3.43 9.14 2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22 14.86 20.57 16.29 22 18.43 19.86 19.86 21.29 21.29 19.86 19.86 18.43 22 16.29 20.57 14.86z"/>
    </svg>

    <div class="login-container text-gray-900 rounded-2xl w-full max-w-md p-8 relative">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="relative">
                <svg class="w-12 h-12 text-red-600 dumbbell-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20.57 14.86L22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14 4.14 5.57 2 7.71 3.43 9.14 2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22 14.86 20.57 16.29 22 18.43 19.86 19.86 21.29 21.29 19.86 19.86 18.43 22 16.29 20.57 14.86z"/>
                </svg>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-center text-white mb-2">PF Gym & Fitness</h1>
        <p class="text-gray-400 text-center mb-8">Welcome back, fitness warrior!</p>

        <!-- Tabs -->
        <div class="flex justify-center mb-8">
            <div class="flex space-x-8">
                <button id="loginTab" class="tab active text-lg font-medium text-white pb-2">Login</button>
                <button id="registerTab" class="tab text-lg font-medium text-gray-400 pb-2">Register</button>
            </div>
        </div>

        <!-- Login Form -->
        <div id="loginForm" class="form-container">
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <input type="email" id="email" class="input-field w-full px-4 py-3 rounded-lg text-white outline-none" placeholder="your@email.com">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <a href="#" class="text-sm text-[#ff8c2d] hover:text-[#ffa357] transition-colors">Forgot?</a>
                    </div>
                    <input type="password" id="password" class="input-field w-full px-4 py-3 rounded-lg text-white outline-none" placeholder="••••••••">
                </div>

                <div class="flex items-center">
                    <input id="remember" type="checkbox" class="w-4 h-4 text-blue-500 border-gray-600 rounded focus:ring-blue-500">
                    <label for="remember" class="ml-2 text-sm text-gray-300">Remember me</label>
                </div>

                <button class="btn-primary w-full py-3 rounded-lg text-white font-medium">
                    Login
                </button>

                <div class="relative flex items-center justify-center mt-6">
                    <div class="border-t border-gray-600 w-full"></div>
                    <span class="bg-slate-800 bg-opacity-70 text-[rgba(52, 38, 38, 0.7)] text-sm px-3 absolute">or continue with</span>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-6">
                    <button class="social-btn flex justify-center items-center py-2 px-4 rounded-lg bg-[rgba(52, 38, 38, 0.7)] hover:bg-slate-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#EA4335">
                            <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
                        </svg>
                    </button>
                    <button class="social-btn flex justify-center items-center py-2 px-4 rounded-lg bg-[rgba(52, 38, 38, 0.7)] hover:bg-slate-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#1877F2">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </button>
                    <button class="social-btn flex justify-center items-center py-2 px-4 rounded-lg bg-[rgba(52, 38, 38, 0.7)] hover:bg-slate-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#000000">
                            <path d="M22.2125 5.65605C21.4491 5.99375 20.6395 6.21555 19.8106 6.31411C20.6839 5.79132 21.3374 4.9689 21.6493 4.00005C20.8287 4.48761 19.9305 4.83077 18.9938 5.01461C18.2031 4.17106 17.098 3.66555 15.9418 3.66555C13.6326 3.66555 11.7597 5.52992 11.7597 7.82184C11.7597 8.14905 11.7973 8.46877 11.8676 8.77353C8.39047 8.60653 5.31007 6.95159 3.24678 4.45055C2.87529 5.09153 2.68005 5.82332 2.68005 6.59682C2.68005 8.07053 3.4209 9.37024 4.54143 10.1021C3.84352 10.0809 3.18303 9.89248 2.59966 9.58923V9.64123C2.59966 11.6549 4.04626 13.3222 5.98931 13.7079C5.62728 13.8042 5.24033 13.8573 4.84033 13.8573C4.5574 13.8573 4.28267 13.8307 4.01303 13.7817C4.57257 15.4222 6.11517 16.6172 7.9394 16.6488C6.51252 17.7612 4.70566 18.4293 2.7473 18.4293C2.39994 18.4293 2.05703 18.4092 1.71997 18.3705C3.56374 19.5586 5.77027 20.2495 8.16096 20.2495C15.9316 20.2495 20.212 13.9282 20.212 8.42092C20.212 8.2444 20.2076 8.06856 20.199 7.89272C21.0312 7.29917 21.6501 6.5334 22.2125 5.65605Z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Register Form (Hidden by default) -->
        <div id="registerForm" class="form-container hidden">
            <div class="space-y-4">
                <div>
                    <label for="fullName" class="block text-sm font-medium text-gray-300 mb-1">Full Name</label>
                    <input type="text" id="fullName" class="input-field w-full px-4 py-3 rounded-lg text-white outline-none" placeholder="John Doe">
                </div>

                <div>
                    <label for="regEmail" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <input type="email" id="regEmail" class="input-field w-full px-4 py-3 rounded-lg text-white outline-none" placeholder="your@email.com">
                </div>

                <div>
                    <label for="regPassword" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <input type="password" id="regPassword" class="input-field w-full px-4 py-3 rounded-lg text-white outline-none" placeholder="••••••••">
                </div>

                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
                    <input type="password" id="confirmPassword" class="input-field w-full px-4 py-3 rounded-lg text-white outline-none" placeholder="••••••••">
                </div>

                <div class="flex items-center">
                    <input id="terms" type="checkbox" class="w-4 h-4 text-blue-500 border-gray-600 rounded focus:ring-blue-500">
                    <label for="terms" class="ml-2 text-sm text-gray-300">I agree to the <a href="#" class="text-blue-400 hover:text-blue-300">Terms</a> and <a href="#" class="text-blue-400 hover:text-blue-300">Privacy Policy</a></label>
                </div>

                <button class="btn-primary w-full py-3 rounded-lg text-white font-medium">
                    Create Account
                </button>

                <div class="relative flex items-center justify-center mt-6">
                    <div class="border-t border-gray-600 w-full"></div>
                    <span class="bg-slate-800 bg-opacity-70 text-gray-400 text-sm px-3 absolute">or register with</span>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-6">
                    <button class="social-btn flex justify-center items-center py-2 px-4 rounded-lg bg-[rgba(52, 38, 38, 0.7)] hover:bg-slate-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#EA4335">
                            <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
                        </svg>
                    </button>
                    <button class="social-btn flex justify-center items-center py-2 px-4 rounded-lg bg-[rgba(52, 38, 38, 0.7)] hover:bg-slate-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#1877F2">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </button>
                    <button class="social-btn flex justify-center items-center py-2 px-4 rounded-lg bg-[rgba(52, 38, 38, 0.7)] hover:bg-slate-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#000000">
                            <path d="M22.2125 5.65605C21.4491 5.99375 20.6395 6.21555 19.8106 6.31411C20.6839 5.79132 21.3374 4.9689 21.6493 4.00005C20.8287 4.48761 19.9305 4.83077 18.9938 5.01461C18.2031 4.17106 17.098 3.66555 15.9418 3.66555C13.6326 3.66555 11.7597 5.52992 11.7597 7.82184C11.7597 8.14905 11.7973 8.46877 11.8676 8.77353C8.39047 8.60653 5.31007 6.95159 3.24678 4.45055C2.87529 5.09153 2.68005 5.82332 2.68005 6.59682C2.68005 8.07053 3.4209 9.37024 4.54143 10.1021C3.84352 10.0809 3.18303 9.89248 2.59966 9.58923V9.64123C2.59966 11.6549 4.04626 13.3222 5.98931 13.7079C5.62728 13.8042 5.24033 13.8573 4.84033 13.8573C4.5574 13.8573 4.28267 13.8307 4.01303 13.7817C4.57257 15.4222 6.11517 16.6172 7.9394 16.6488C6.51252 17.7612 4.70566 18.4293 2.7473 18.4293C2.39994 18.4293 2.05703 18.4092 1.71997 18.3705C3.56374 19.5586 5.77027 20.2495 8.16096 20.2495C15.9316 20.2495 20.212 13.9282 20.212 8.42092C20.212 8.2444 20.2076 8.06856 20.199 7.89272C21.0312 7.29917 21.6501 6.5334 22.2125 5.65605Z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html


