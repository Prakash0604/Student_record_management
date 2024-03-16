<!doctype html>
<html lang="en">
    <head>
        <title>{{ $data['title'] }}</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container">
            <div class="card text-center">
                <h4>Dear {{ $data['name'] }}</h4>
                <p>Thank you for registering our system now plese veriy your email address to authorize</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Verify Now</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data['email'] }}</td>
                            <td>{{ $data['password'] }}</td>
                            <td>
                                <a href="{{ $data['url'] }}">
                                    <button class="btn btn-warning">Click Here to verify</button>
                                 </a>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
