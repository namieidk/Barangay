<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    <title>Person Data</title>
</head>
<body>
<div class="w-[1124px] ml-0  bg-[#5A7A46] " style="height: 600px;">
    <form class="ml-4 " >
        <div class="text-left " >
            <div class="inline-block mr-[50px]">
                <label for="surname" class="block whitespace-nowrap">Surname</label>
                <input type="text" id="surname" name="surname" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
                <label for="last-name" class="block whitespace-nowrap">Last Name</label>
                <input type="text" id="last-name" name="last-name" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
                <label for="middle-name" class="block whitespace-nowrap">Middle Name</label>
                <input type="text" id="middle-name" name="middle-name" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
                <label for="nickname" class="block whitespace-nowrap">Nickname</label>
                <input type="text" id="nickname" name="nickname" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
                <label for="gender" class="block whitespace-nowrap">Gender</label>
                <input type="text" id="gender" name="gender" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 160px">
            </div>
        </div>

        <div class="text-left mt-4">
            <div class="inline-block mr-[50px]">
                <label for="citizenship" class="block whitespace-nowrap">Citizenship</label>
                <input type="text" id="citizenship" name="citizenship" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
                <label for="birthdate" class="block whitespace-nowrap">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
                <label for="age" class="block whitespace-nowrap">Age</label>
                <input type="text" id="age" name="age" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
                <label for="place-of-birth" class="block whitespace-nowrap">Place of Birth</label>
                <input type="text" id="place-of-birth" name="place-of-birth" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
                <label for="telephone" class="block whitespace-nowrap">Telephone</label>
                <input type="text" id="telephone" name="telephone" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 160px">
            </div>
        </div>

        <div class="text-left mt-4">
            <div class="inline-block mr-[50px]">
            <label for="house-no" class="block whitespace-nowrap">Address(House No.)</label>
            <input type="text" id="house-no" name="house-no" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="village" class="block whitespace-nowrap">Village/Sitio</label>
            <input type="text" id="village" name="village" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="barangay" class="block whitespace-nowrap">Barangay</label>
            <input type="text" id="barangay" name="barangay" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="town-city" class="block whitespace-nowrap">Town/City</label>
            <input type="text" id="town-city" name="town-city" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="province" class="block whitespace-nowrap">Province</label>
            <input type="text" id="province" name="province" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 160px">
            </div>
        </div>

        <div class="text-left mt-4">
            <div class="inline-block mr-[50px]">
            <label for="other-address" class="block whitespace-nowrap">Other Address</label>
            <input type="text" id="other-address" name="other-address" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="other-village" class="block whitespace-nowrap">Village/Sitio</label>
            <input type="text" id="other-village" name="other-village" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="other-barangay" class="block whitespace-nowrap">Barangay</label>
            <input type="text" id="other-barangay" name="other-barangay" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="other-town-city" class="block whitespace-nowrap">Town/City</label>
            <input type="text" id="other-town-city" name="other-town-city" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="other-province" class="block whitespace-nowrap">Province</label>
            <input type="text" id="other-province" name="other-province" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 160px">
            </div>
        </div>

        <div class="text-left mt-4">
            <div class="inline-block mr-[50px]">
            <label for="date-reported" class="block whitespace-nowrap">Date & Time Reported</label>
            <input type="datetime-local" id="date-reported" name="date-reported" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 230px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="date-incident" class="block whitespace-nowrap">Date & Time of Incident</label>
            <input type="datetime-local" id="date-incident" name="date-incident" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 230px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="email-address" class="block whitespace-nowrap">Email Address</label>
            <input type="text" id="email-address" name="email-address" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 200px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="occupation" class="block whitespace-nowrap">Occupation</label>
            <input type="text" id="occupation" name="occupation" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 170px">
            </div>
        </div>

        <div class="text-left mt-4">
            <div class="inline-block mr-[50px]">
            <label for="civil-status" class="block whitespace-nowrap">Civil Status</label>
            <input type="text" id="civil-status" name="civil-status" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 160px">
            </div>
            <div class="inline-block mr-[50px]">
            <label for="educational-attainment" class="block whitespace-nowrap">Highest Educational Attainment</label>
            <input type="text" id="educational-attainment" name="educational-attainment" class="block border-b border-[#000000] bg-white outline-none text-[#000000]" style="width: 160px">
            </div>
        </div>
        <div class="flex justify-end mt-[50px] mr-[50px]">
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