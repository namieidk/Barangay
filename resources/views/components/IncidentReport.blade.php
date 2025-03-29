<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    <title>Person Data</title>
</head>
<body>
<div class="w-[1124px] ml-0  bg-[#5A7A46] " style="height: 550px;">
    <form class="ml-4 " >

        <div class="text-center mb-10 flex items-center mr-10 space-x-10 justify-center">
            <h1 class="text-3xl font-bold">INCIDENT REPORT TRANSACTION RECEIPT</h1>
            <div class="inline-block">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View Receipt</button>
            </div>
        </div>

        <div class="text-left mb-10" >
            <div class="inline-block mr-[50px]">
            <label for="blotter-entry-number" class="block whitespace-nowrap">Blotter Entry Number </label>
            <input type="text" id="blotter-entry-number" name="blotter_entry_number" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 200px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="incident-type" class="block whitespace-nowrap">Type of Incident </label>
            <input type="text" id="incident-type" name="incident_type" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 200px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="reporting-person-name" class="block whitespace-nowrap">Name of Reporting Person </label>
            <input type="text" id="reporting-person-name" name="reporting_person_name" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 200px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="reporting-person-address" class="block whitespace-nowrap">Address of Reporting Person</label>
            <input type="text" id="reporting-person-address" name="reporting_person_address" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 200px">
            </div>
        </div>

        <div class="text-left mb-10">
            <div class="inline-block mr-[50px]">
            <label for="report-date-time" class="block whitespace-nowrap">Date & Time of Report</label>
            <input type="datetime-local" id="report-date-time" name="report_date_time" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 200px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="incident-date-time" class="block whitespace-nowrap">Date & Time of Incident</label>
            <input type="datetime-local" id="incident-date-time" name="incident_date_time" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 200px">
            </div>
             <div class="inline-block mr-[50px]">
            <label for="incident-place" class="block whitespace-nowrap">Place of Incident</label>
            <input type="text" id="incident-place" name="incident_place" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 250px">
            </div> 
        </div>

        <div class="text-left mb-10">
            <div class="inline-block mr-[50px]">
                <label for="message" class="block mb-2 text-mg font-medium text-gray-900">This is to certifies that (Name of the Reportee) reported an incident to be recorded in the barangay blotter which involves</label>
            </div>
        </div>

        <div class="text-left">
            <div class="flex items-start max-w-xl">
            <div class="w-[150px] h-[150px] mr-6 border border-black">
                <img
                id="preview-image"
                class="h-full w-full object-cover"
                src=""
                alt="Uploaded Image"
                />
            </div>

            <div class="flex-1 pt-4">
                <h1 class="text-2xl font-bold text-black">
                    <span id="person-name-display">[Name]</span>
                </h1>
                <div class="w-full h-[1px] bg-black my-2"></div>
                <p class="text-base text-black">
                    <span id="person-position-display">[Position/Name/Signature]</span>
                </p>
            </div>
            </div>
        </div>
        <div class="flex justify-end mt-[-30px] mr-[50px]">
        <div class="inline-block mr-[20px]">
            <button type="submit" class="bg-[#d1e2c4] border text-[#00000] px-4 py-2 rounded">Save</button>
        </div>
        <div class="inline-block">
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="window.close()">Close</button>
        </div>
    </form>
</div>
</body>
</html>