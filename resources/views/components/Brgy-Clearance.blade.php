<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    <title>Barangay Clearance/Certificate</title>
</head>
<body>
<div class="min-h-screen bg-[#fff5f7] p-8">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
         
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="mb-6">
                    <div class="inline-block bg-[#d1e2c4] text-black px-6 py-3 rounded-full text-lg font-medium">
                        Manage Brgy Clearance
                    </div>
                </div>

                <div class="mb-8">
                    <button class="bg-[#96bb7e] text-black px-6 py-2 rounded-full font-medium flex items-center justify-center">
                        View Clearance
                    </button>
                </div>

                <div class="space-y-6">
                    <div class="flex justify-between items-center">
                        <label class="font-medium">Clearance Date Issue</label>
                        <input type="date" class="border border-gray-300 rounded-md px-4 py-2">
                    </div>

                    <div class="flex justify-between items-center">
                        <label class="font-medium">OR Number</label>
                        <input type="text" class="border border-gray-300 rounded-md px-4 py-2" placeholder="Enter OR Number">
                    </div>

                    <div class="flex justify-between items-center">
                    <label class="font-medium">OR Date</label>
                        <input type="text" class="border border-gray-300 rounded-md px-4 py-2" placeholder="Enter Year Range (e.g., 2005-2006)" pattern="\d{4}-\d{4}">
                    </div>
                </div>
            </div>

            <!-- Manage Brgy Certification Card -->
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="mb-6">
                    <div class="inline-block bg-[#d1e2c4] text-black px-6 py-3 rounded-full text-lg font-medium">
                        Manage Brgy Certification
                    </div>
                </div>

                <div class="mb-8">
                    <button class="bg-[#96bb7e] text-black px-6 py-2 rounded-full font-medium flex items-center justify-center">
                        View Certification
                    </button>
                </div>

                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                    <label class="font-medium">Certificate Date Issue</label>
                        <span>02/14/2025</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="font-medium">Res. Cert. No</span>
                        <span>BRGY-2025-0347</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="font-medium">Issued at</span>
                        <span>Brgy Incio Hall</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="font-medium">Issued on</span>
                        <span>02/14/2025</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="font-medium">Purpose</span>
                        <span class="bg-[#fde8f1] px-4 py-1 rounded-md">Abroad</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center gap-4 mt-20">
            <button class="bg-[#d1e2c4] text-black px-10 py-3 rounded-full font-medium">Save</button>
            <button class="bg-[#d1e2c4] text-black px-10 py-3 rounded-full font-medium">Edit</button>
            <button class="bg-[#d1e2c4] text-black px-10 py-3 rounded-full font-medium">Archive</button>
            <button class="bg-[#d1e2c4] text-black px-10 py-3 rounded-full font-medium">Close</button>
        </div>
    </div>
</div>  
</body>
</html>
