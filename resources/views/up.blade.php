<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('singup') }}" method="post">
    @csrf 

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="roles">role:</label>
        <select name='role'>
            <option value='admin'>Admin</option>
            <option value='assistance'>Assistance</option>
            <option value='vendeur'>Vendeur</option>
            <option value='magasiniere'>Magasinière</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </form>
</body>
</html>
