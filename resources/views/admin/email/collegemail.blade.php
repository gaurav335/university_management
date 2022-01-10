@component('mail::message')
Hi, {{$collegemail->name}}

<b>Congratulations Your Account Is Verify Sucessfully Now You Can Login...</b>

<table>
    <tr>
        <th>Email</th>
        <th>Password</th>
    </tr></br>
    <tr>
        <td>{{$collegemail->email}}</td>
        <td>{{$collegemail->password}}</td>
    </tr>
</table></br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
