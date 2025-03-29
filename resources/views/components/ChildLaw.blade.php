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
        <div class="text-left mb-5" >
            <div class="inline-block mr-[50px]">
            <label for="guardian-name" class="block whitespace-nowrap">Name of Guardian</label>
            <input type="text" id="guardian-name" name="guardian-name" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="guardian-address" class="block whitespace-nowrap">Guardian Address</label>
            <input type="text" id="guardian-address" name="guardian-address" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="guardian-telephone" class="block whitespace-nowrap">Telephone</label>
            <input type="text" id="guardian-telephone" name="guardian-telephone" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="guardian-phone" class="block whitespace-nowrap">Phone Number</label>
            <input type="text" id="guardian-phone" name="guardian-phone" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
        </div>

        <div class="text-left mb-5">
            <div class="inline-block mr-[50px]">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Diversion Mechanism</label>
                <textarea id="message" name="message" rows="4" class="block p-2.5 w-[500px] text-sm text-black bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
        </div>

        <div class="text-left">
            <div class="inline-block mr-[50px]">
                <label for="message" class="block mb-2 text-mg font-medium text-gray-900">Other distinguishing features: Describe in detail the clothes, vehicle, sunglasses, weapon(s), scars, and any other notable data or activities of the suspect(s) that were observed by the reporting person and/or witness(es). These details are crucial and may become evidence to identify and link the suspect(s) to the crime.</label>
                <textarea id="message" name="message" rows="4" class="block p-2.5 w-full text-sm text-black bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
        </div>
        
        <div class="flex justify-end mt-[60px] mr-[50px]">
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