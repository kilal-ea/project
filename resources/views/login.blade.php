<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="flex items-center max-lg:p-14 bg-emerald-100 justify-center h-screen">
@vite('resources/css/app.css')
    <div class="max-w-md shadow-xl bg-white p-6 rounded-xl w-full">
        <duv class='flex justify-center'>
            <h1 class="text-3xl font-bold mb-4">Login</h1>
        </duv>
        
        <form action="{{ route('con') }}" method="post">
            @csrf 
            <div class="mb-10">
                <label for="email" class="block text-sm font-semibold">Email</label>
                <input type="email" class="form-input mt-1 block w-full" name="email" id="email" aria-describedby="emailHelpId" placeholder="Enter your email">
            </div>
            <div class="mb-10">
                <label for="password" class="block text-sm font-semibold">Password</label>
                <input type="password" class="form-input mt-1 block w-full" name="password" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="bg-emerald-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
</body>
</html>
