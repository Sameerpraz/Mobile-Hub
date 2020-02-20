<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Subscription Card</title>

        <style>
            #cardwapper{
                width: 100%;
                /* height: 3.88in; */
                border: 1px solid lightseagreen;
                border-radius: 5px;
                font-size: 14px;
                /* position: relative; */
                text-align: center;
            }
            .logo{
                padding: 10px;
                text-align: center;
                border-radius: 5px 5px 0 0;
                background: #2B333E;
            }
            .logo img{
                width: 80px;
                height:80px
            }
            .logo span{
                font-size: 22px;
                color: #fff;
                text-align: left;
            }
            .avatar{
                padding: 5px;
                text-align: center;
                margin-top: 15px;
            }
            .avatar img{
                border: 2px solid #aaa;
                border-radius: 5px;
                width: 100px;
                padding: 4px;
            }
            .details{
                text-align: center;
            }
            .details h1{
                margin: 10px 0 0 0;
                padding: 0;
                font-size: 20px;
            }
            .details h4{
                margin: 0;
                padding: 2px 0;
                font-weight: normal;
            }

            .details h4.mem_type{
                margin-bottom: 20px;
            }
            .details h4.phone{
                margin-bottom: 10px;
            }

            .footer{
                width: 100%;
                background: #2B333E;
                border-radius: 0 0 5px 5px;
                /* position: absolute; */
                bottom: 0;
                left: 0;
                right: 0;
                color: #fff;
                padding: 4px 0;
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
        <div id="cardwapper">
            <div class="logo">
                <table>
                    <tr>
                        <td><img src="{{ public_path('images/logo.png') }}" alt="logo" {{ config('app.name') }}></td>
                        <td><span>{{ config('app.name') }}</span></td>
                    </tr>
                </table>
            </div>
            <div class="avatar">
                @if($milk->image)
                <img src="{{ public_path('uploads/milk/'.$milk->image) }}">
                @else
                <img src="{{ public_path('images/icons-user.png') }}">
                @endif
            </div>
            <div class="details">
                <h4 class="mem_type">Issue Date: {{ $milk->created_at->format('M Y') }}</h4>
                <h1 class="title">{{ $milk->name }}</h1>
                <h4 class="email">Email: {{ $milk->email }}</h4>
                <h4 class="address">Address: {{ $milk->address }}</h4>
                <h4 class="phone">Phone: {{ $milk->phone }}</h4>

                <h4 class="date">Subscription Type: {{ $milk->subscription_type }}</h4>
                <h4 class="date">Volume: {{$milk->options}}</h4>
                <h4 class="date">Quantity: {{$milk->quantity}}</h4>


            </div>
            <div class="footer">
                www.bhagwansthan.com
            </div>
        </div>
    </body>
</html>