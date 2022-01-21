<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
</head>
<body>
    <table>
        <tr>
            <td>Dear, {{ $name }}</td>
        </tr>
        <tr>
            <td>Your password hasbeen successfully changed.
                Your new password is : 
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>New Password : {{ $password }}</td>
        </tr>
        <tr><td><a href="{{route('adminLogin')}}">Click Here to Login</a></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Best Regards : First Website</td></tr> 

    </table>
</body>
</html>