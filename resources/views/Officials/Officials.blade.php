<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials Management</title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Lato&display=swap);
        @import url(https://fonts.googleapis.com/css2?family=Open+Sans&display=swap);
        @import url(https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200);
        .required-asterisk {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <x-sidebar></x-sidebar>

    <div class="flex-1 ml-20 pt-14">
        <div class="p-6 w-full max-w-5xl mx-auto">
            <div id="webcrumbs">
                <div class="w-[1024px] bg-white font-sans rounded-xl shadow-md border border-gray-200">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-semibold text-gray-800">Barangay Officials Management</h2>
                        </div>

                        @if (session('success'))
                            <div class="text-green-600 font-semibold mb-4">{{ session('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="text-red-500 mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="bg-[#FFFF] rounded-xl shadow-md p-6 mb-8 border border-gray-200">
                            <h3 class="text-xl font-medium text-gray-800 mb-4">{{ isset($official) ? 'Edit Barangay Official' : 'Add New Barangay Official' }}</h3>
                            <form action="{{ isset($official) ? route('officials.update', $official) : route('officials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                @csrf
                                @if(isset($official))
                                    @method('PUT')
                                @endif

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-gray-700 text-sm font-medium mb-2" for="position">Position <span class="required-asterisk">*</span></label>
                                        <select id="position" name="position" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('position') border-red-500 @enderror" required>
                                            <option value="">Select Position</option>
                                            <option value="captain" {{ old('position', isset($official) ? $official->position : '') == 'captain' ? 'selected' : '' }}>Barangay Captain</option>
                                            <option value="secretary" {{ old('position', isset($official) ? $official->position : '') == 'secretary' ? 'selected' : '' }}>Barangay Secretary</option>
                                            <option value="treasurer" {{ old('position', isset($official) ? $official->position : '') == 'treasurer' ? 'selected' : '' }}>Barangay Treasurer</option>
                                            <option value="councilor" {{ old('position', isset($official) ? $official->position : '') == 'councilor' ? 'selected' : '' }}>Barangay Councilor</option>
                                            <option value="sk_chairman" {{ old('position', isset($official) ? $official->position : '') == 'sk_chairman' ? 'selected' : '' }}>SK Chairman</option>
                                        </select>
                                        @error('position')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 text-sm font-medium mb-2" for="term">Term Period <span class="required-asterisk">*</span></label>
                                        <div class="grid grid-cols-2 gap-4">
                                            <input type="date" id="term_start" name="term_start" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('term_start') border-red-500 @enderror" value="{{ old('term_start', isset($official) ? $official->term_start : '') }}" required>
                                            @error('term_start')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                            <input type="date" id="term_end" name="term_end" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('term_end') border-red-500 @enderror" value="{{ old('term_end', isset($official) ? $official->term_end : '') }}" required>
                                            @error('term_end')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block text-gray-700 text-sm font-medium mb-2" for="first_name">First Name <span class="required-asterisk">*</span></label>
                                        <input type="text" id="first_name" name="first_name" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('first_name') border-red-500 @enderror" placeholder="Enter first name" value="{{ old('first_name', isset($official) ? $official->first_name : '') }}" required>
                                        @error('first_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 text-sm font-medium mb-2" for="middle_name">Middle Name <span class="required-asterisk">*</span></label>
                                        <input type="text" id="middle_name" name="middle_name" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('middle_name') border-red-500 @enderror" placeholder="Enter middle name" value="{{ old('middle_name', isset($official) ? $official->middle_name : '') }}" required>
                                        @error('middle_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 text-sm font-medium mb-2" for="last_name">Last Name <span class="required-asterisk">*</span></label>
                                        <input type="text" id="last_name" name="last_name" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('last_name') border-red-500 @enderror" placeholder="Enter last name" value="{{ old('last_name', isset($official) ? $official->last_name : '') }}" required>
                                        @error('last_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 text-sm font-medium mb-2" for="birthdate">Birthdate <span class="required-asterisk">*</span></label>
                                        <input type="date" id="birthdate" name="birthdate" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('birthdate') border-red-500 @enderror" value="{{ old('birthdate', isset($official) ? $official->birthdate : '') }}" required>
                                        @error('birthdate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 text-sm font-medium mb-2" for="gender">Gender <span class="required-asterisk">*</span></label>
                                        <select id="gender" name="gender" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('gender') border-red-500 @enderror" required>
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ old('gender', isset($official) ? $official->gender : '') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender', isset($official) ? $official->gender : '') == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ old('gender', isset($official) ? $official->gender : '') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 text-sm font-medium mb-2" for="contact_number">Contact Number <span class="required-asterisk">*</span></label>
                                        <input type="text" id="contact_number" name="contact_number" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('contact_number') border-red-500 @enderror" placeholder="Enter contact number" value="{{ old('contact_number', isset($official) ? $official->contact_number : '') }}" required>
                                        @error('contact_number')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label class="block text-gray-700 text-sm font-medium mb-2" for="address">Address <span class="required-asterisk">*</span></label>
                                    <input type="text" id="address" name="address" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 @error('address') border-red-500 @enderror" placeholder="Enter complete address" value="{{ old('address', isset($official) ? $official->address : '') }}" required>
                                    @error('address')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-8 flex justify-end space-x-4">
                                    <a href="{{ route('officials.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-300">Cancel</a>
                                    <button type="submit" class="text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] px-5 py-2.5 rounded-lg transition-all duration-300 shadow-md">
                                        {{ isset($official) ? 'Update Official' : 'Save Official' }}
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Debug: Check officials count -->
                        <div class="mb-4 text-gray-600">
                            Debug: {{ isset($officials) ? $officials->count() . ' officials found' : 'No officials defined' }}
                        </div>

                        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                            <div class="px-6 py-4 bg-[#e6ffe6] border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-800">Current Barangay Officials</h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Term Period</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @if(isset($officials) && $officials->isNotEmpty())
                                            @foreach ($officials as $official)
                                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900">{{ $official->first_name }} {{ $official->middle_name ? $official->middle_name . ' ' : '' }}{{ $official->last_name }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 py-1 text-xsรรม

System: font-medium rounded-full bg-primary-100 text-primary-800">{{ ucfirst($official->position) }}</span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $official->term_start->format('Y') }} - {{ $official->term_end->format('Y') }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $official->contact_number }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <div class="flex space-x-2">
                                                            <a href="{{ route('officials.edit', $official) }}" class="text-primary-600 hover:text-primary-800 transition-colors duration-150">
                                                                <span class="material-symbols-outlined">edit</span>
                                                            </a>
                                                            <a href="{{ route('officials.show', $official) }}" class="text-gray-600 hover:text-gray-800 transition-colors duration-150">
                                                                <span class="material-symbols-outlined">visibility</span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">No officials found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            content: ["./src/**/*.{html,js}"],
            theme: {
                name: "Bluewave",
                fontFamily: {
                    sans: [
                        "Open Sans",
                        "ui-sans-serif",
                        "system-ui",
                        "sans-serif",
                        '"Apple Color Emoji"',
                        '"Segoe UI Emoji"',
                        '"Segoe UI Symbol"',
                        '"Noto Color Emoji"'
                    ]
                },
                extend: {
                    fontFamily: {
                        title: [
                            "Lato",
                            "ui-sans-serif",
                            "system-ui",
                            "sans-serif",
                            '"Apple Color Emoji"',
                            '"Segoe UI Emoji"',
                            '"Segoe UI Symbol"',
                            '"Noto Color Emoji"'
                        ],
                        body: [
                            "Open Sans",
                            "ui-sans-serif",
                            "system-ui",
                            "sans-serif",
                            '"Apple Color Emoji"',
                            '"Segoe UI Emoji"',
                            '"Segoe UI Symbol"',
                            '"Noto Color Emoji"'
                        ]
                    },
                    colors: {
                        neutral: {
                            50: "#f7f7f7",
                            100: "#eeeeee",
                            200: "#e0e0e0",
                            300: "#cacaca",
                            400: "#b1b1b1",
                            500: "#999999",
                            600: "#7f7f7f",
                            700: "#676767",
                            800: "#545454",
                            900: "#464646",
                            950: "#282828"
                        },
                        primary: {
                            50: "#f3f1ff",
                            100: "#e9e5ff",
                            200: "#d5cfff",
                            300: "#b7a9ff",
                            400: "#9478ff",
                            500: "#7341ff",
                            600: "#631bff",
                            700: "#611bf8",
                            800: "#4607d0",
                            900: "#3c08aa",
                            950: "#220174",
                            DEFAULT: "#611bf8"
                        }
                    }
                },
                fontSize: {
                    xs: ["12px", { lineHeight: "19.200000000000003px" }],
                    sm: ["14px", { lineHeight: "21px" }],
                    base: ["16px", { lineHeight: "25.6px" }],
                    lg: ["18px", { lineHeight: "27px" }],
                    xl: ["20px", { lineHeight: "28px" }],
                    "2xl": ["24px", { lineHeight: "31.200000000000003px" }],
                    "3xl": ["30px", { lineHeight: "36px" }],
                    "4xl": ["36px", { lineHeight: "41.4px" }],
                    "5xl": ["48px", { lineHeight: "52.800000000000004px" }],
                    "6xl": ["60px", { lineHeight: "66px" }],
                    "7xl": ["72px", { lineHeight: "75.60000000000001px" }],
                    "8xl": ["96px", { lineHeight: "100.80000000000001px" }],
                    "9xl": ["128px", { lineHeight: "134.4px" }]
                },
                borderRadius: {
                    none: "0px",
                    sm: "6px",
                    DEFAULT: "12px",
                    md: "18px",
                    lg: "24px",
                    xl: "36px",
                    "2xl": "48px",
                    "3xl": "72px",
                    full: "9999px"
                },
                spacing: {
                    0: "0px",
                    1: "4px",
                    2: "8px",
                    3: "12px",
                    4: "16px",
                    5: "20px",
                    6: "24px",
                    7: "28px",
                    8: "32px",
                    9: "36px",
                    10: "40px",
                    11: "44px",
                    12: "48px",
                    14: "56px",
                    16: "64px",
                    20: "80px",
                    24: "96px",
                    28: "112px",
                    32: "128px",
                    36: "144px",
                    40: "160px",
                    44: "176px",
                    48: "192px",
                    52: "208px",
                    56: "224px",
                    60: "240px",
                    64: "256px",
                    72: "288px",
                    80: "320px",
                    96: "384px",
                    px: "1px",
                    0.5: "2px",
                    1.5: "6px",
                    2.5: "10px",
                    3.5: "14px"
                }
            },
            plugins: [],
            important: "#webcrumbs"
        }
    </script>
</body>
</html>