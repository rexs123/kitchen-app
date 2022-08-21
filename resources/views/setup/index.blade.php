<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Setup</title>

	@vite(['resources/css/app.css'])
</head>
<body class="flex justify-center align-center">
	<div class="w-1/3 p-4">
        <h1 class="my-3 text-xl font-bold">
            Setup
        </h1>
        <form action="{{ route('setup.store') }}" method="post">
            @csrf
            @method('post')

            <div class="my-3">
                <label for="email">First Name</label>
                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    placeholder="First Name"
                    required
                    autofocus
                    class="block mt-1 w-full border border-gray-400 p-1"
                >
            </div>
			<div class="my-3">
                <label for="email">Last Name</label>
                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    placeholder="Last Name"
                    required
                    class="block mt-1 w-full border border-gray-400 p-1"
                >
            </div>
			<div class="my-3">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Email Address"
                    required
                    class="block mt-1 w-full border border-gray-400 p-1"
                >
            </div>
            <div class="my-3">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Your password"
                    required
                    class="block mt-1 w-full border border-gray-400 p-1">
            </div>
            <div class="my-3">
                <button class="border border-gray-500 px-4 py-2">Complete Setup</button>
            </div>
        </form>
    </div>
</body>
</html>
