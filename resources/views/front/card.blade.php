@extends('front.tamplate')

@push('css')
    <style>
        body {
            margin: 0;
            font-family: arial;
            background: #d7dbe0;
        }

        .card {
            border-radius: 10px;
            background: white;

            width: 800px;
            border: 1px solid #e3e6ea;
            margin: auto;
            margin-top: 10%
        }

        .header {
            width: 90%;
            color: #5E6989;
            font-size: 22px;

            padding: 0 5%;

        }

        .product {
            display: flex;
            width: 90%;
            align-items: center;
            justify-content: space-between;
            padding: 2% 5%;
            border-top: 1px solid #e3e6ea;


        }

        .quant {
            display: flex;
            justify-content: space-between;
            width: 90px;

        }

        .pu {
            display: none;
        }

        .op {
            color: #AAB8C2;
            display: flex;
            justify-content: space-between;
            width: 50px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        img {
            background: #F7F7F9;
        }

        .name {
            font-size: 18px;
            margin-bottom: 10px;
            color: #525354;
        }

        .color {
            color: darkgray;
            font-weight: 10;
        }

        .plus,
        .minus {
            color: #AAB8C2;
            font-size: 28px;
            background: #E1E8EE;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            cursor: pointer;
        }

        .price {
            font-weight: 100;
            font-size: 20px;
            color: gray;

        }

        .red {
            color: red
        }
   
    </style>
@endpush


@section('main-section')
<body>
    @if(Session::get('logindata'))
        <div class="card">
            <div class="header">
                <h4>Shopping Bag total :
                    <span id="tot">
                        0
                    </span>$
                </h4>
            </div>
            <div class="product">
                <div>
                    <div class="op">
                        <span class="remove">X</span>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div>

                    <img width="120" height="100" class="img"
                        src="https://images.footaction.com/pi/A0524601/zoom/nike-air-huarache-womens" alt="">
                </div>
                <div class="disc">
                    <div class="name">sbadri 1</div>
                    <div class="color">red</div>

                </div>
                <div class="quant">
                    <span class="plus">+</span>
                    <span class="qt">1</span>
                    <span class="minus">-</span>
                </div>
                <div>
                    <h4 class="price">
                        54$
                    </h4>
                    <h4 class="pu">54</h4>

                </div>

            </div>
        </div>
    @else
        <div class="card">
            <div class="product">
                <h2>Your Shooping Cart is empty</h2>
                <h3><a href="{{route('front.home')}}">Shop today’s deals</a></h3>
                <h4><a href="{{route('front.login')}}">Sign IN </a></button></h4>
            </div>
        </div>
    @endif
    <script src="index.js"></script>
</body>
@endsection

@push('js')
<script>
let products = document.getElementsByClassName("product");

function sum() {
    let sum = document.getElementById("tot");
    let arr = document.getElementsByClassName("price");
    sum.innerText = 0;
    for (x of arr) {
        let txt = x.innerText;
        sum.innerText =
            Number(sum.innerText) + Number(txt.substring(0, txt.length - 1));
    }
}
sum();

for (let i = 0; i < products.length; i++) {
    let elem = products[i];
    let pu = elem.querySelector(".pu").innerText;
    elem.addEventListener("click", e => {
        switch (e.target.className) {
            case "fas fa-heart":
            case "fas fa-heart red":
                e.target.classList.toggle("red");
                break;
            case "remove":
                elem.remove();
                break;
            case "plus":
                elem.querySelector(".qt").innerText++;

                elem.querySelector(".price").innerText =
                    pu * elem.querySelector(".qt").innerText + "$";
                sum();
                break;
            case "minus":
                if (elem.querySelector(".qt").innerText > 0) {
                    elem.querySelector(".qt").innerText--;
                    elem.querySelector(".price").innerText =
                        pu * elem.querySelector(".qt").innerText + "$";
                    sum();
                }
                break;
        }
    });
}
</script>
@endpush