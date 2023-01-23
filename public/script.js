//----------------------------------------------Test Script (PayMob task - Mayar Moawad------------------------------------------------//
const api_key = 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2libUZ0WlNJNkltbHVhWFJwWVd3aUxDSndjbTltYVd4bFgzQnJJam8yTnpZM056VjkuVi1uR1owZGgwbW0xQTVsVzF0SFpvVnZFclNZNnkyYUlObTluTzRkQjNzMmVsLWNnR2otT21oT0pfXzZMUEVsT3I5aUVvUExOOHRlcE4yYjlGMVpSdHc='
const iframe_number = 723160
const integration_id = 3307229

//-----------------------------------------------------------------------//
//Step 1:- Payment Flow API


async function authentication_request() {
    console.log('authentication done')
    //api key from user's settings 
    let data = {
        "api_key": api_key
    }
    var request = await fetch('https://accept.paymob.com/api/auth/tokens',
        {
            method: 'post',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)

        })
    var response = await request.json()
    let token = response.token
    //pass token to order function
    order_registeration(token)
}


//-----------------------------------------------------------------------//
//Step 2:- Payment Flow API


async function order_registeration(token) {
    console.log('order api done')
    //input example from documentation
    let data = {
        "auth_token": token,
        "delivery_needed": "false",
        "amount_cents": "100",
        "currency": "EGP",
        "merchant_order_id": 5,
        "items": [
            {
                "name": "ASC1515",
                "amount_cents": "500000",
                "description": "Smart Watch",
                "quantity": "1"
            },
            {
                "name": "ERT6565",
                "amount_cents": "200000",
                "description": "Power Bank",
                "quantity": "1"
            }
        ],
        "shipping_data": {
            "apartment": "803",
            "email": "claudette09@exa.com",
            "floor": "42",
            "first_name": "Clifford",
            "street": "Ethan Land",
            "building": "8028",
            "phone_number": "+86(8)9135210487",
            "postal_code": "01898",
            "extra_description": "8 Ram , 128 Giga",
            "city": "Jaskolskiburgh",
            "country": "CR",
            "last_name": "Nicolas",
            "state": "Utah"
        },
        "shipping_details": {
            "notes": " test",
            "number_of_packages": 1,
            "weight": 1,
            "weight_unit": "Kilogram",
            "length": 1,
            "width": 1,
            "height": 1,
            "contents": "product of some sorts"

        }
    }
    var request = await fetch('https://accept.paymob.com/api/ecommerce/orders',
        {
            method: 'post',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)

        })
    var response = await request.json()
    let order_id = response.id
    setTimeout(() => {
        payment_key(token, integration_id, order_id)
    }, 4000)

    //pass order id & token to payment key request
}

//-----------------------------------------------------------------------//
//Step 3:- Payment Flow API



async function payment_key(token, integration_id, order_id) {
    console.log('payment key done')
    let data = {

        "auth_token": token,
        "amount_cents": "100",
        "expiration": 3600,
        "order_id": order_id,
        "billing_data": {
            "apartment": "803",
            "email": "claudette09@exa.com",
            "floor": "42",
            "first_name": "Clifford",
            "street": "Ethan Land",
            "building": "8028",
            "phone_number": "+86(8)9135210487",
            "shipping_method": "PKG",
            "postal_code": "01898",
            "city": "Jaskolskiburgh",
            "country": "CR",
            "last_name": "Nicolas",
            "state": "Utah"
        },
        "currency": "EGP",
        "integration_id": integration_id,
        "lock_order_when_paid": "false"
    }
    var request = await fetch('https://accept.paymob.com/api/acceptance/payment_keys', {
        method: 'post',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    var response = await request.json()
    let Apayment_token = response.token
    //send payment token to get iframe
    paymentfn(Apayment_token, iframe_number)
}
//-----------------------------------------------------------------------//
//Step 4:- Payment Flow API

async function paymentfn(Apayment_token, iframe_number) {
    var URL
    location.href = `https://accept.paymob.com/api/acceptance/iframes/723160?payment_token=${Apayment_token}`
}

//------------------------------------------------------------------------------------------------------------------------------------------//