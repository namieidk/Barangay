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
        <div class="text-left mb-10" >
            <div class="inline-block mr-[50px]">
            <label for="blotter-entry-number" class="block whitespace-nowrap">Blotter Entry Number</label>
            <input type="text" id="blotter-entry-number" name="blotter-entry-number" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="incident-type" class="block whitespace-nowrap">Type of Incident</label>
            <input type="text" id="incident-type" name="incident-type" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="date-time" class="block whitespace-nowrap">Date & Time</label>
            <input type="text" id="date-time" name="date-time" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="place-of-incident" class="block whitespace-nowrap">Place of Incident</label>
            <input type="text" id="place-of-incident" name="place-of-incident" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
        </div>

        <div class="text-left">
            <div class="inline-block mr-[50px]">
                <label for="message" class="block mb-2 text-mg font-medium text-gray-900">Enter the detail the narrative of the incident or event, answering the WHO, WHAT, WHEN, WHERE, WHY, and HOW of reporting.</label>
                <textarea id="message" name="message" rows="4" class="block p-2.5 w-full text-sm text-black bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
        </div>
        
        <div class="flex justify-end mt-[150px] mr-[50px]">
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