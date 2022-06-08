function payWithPaystack(payload){
    console.log("Paying with PayStack");
    var handler = PaystackPop.setup({
        key: 'pk_live_884c736112222ebdac2a4c647103ec8b1ceb6ecc',
        email: payload.email,
        amount: 50000,
        //ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        metadata: {
            custom_fields: [
                {
                    payload: JSON.stringify(payload)
                }
            ]
        },
        callback: function(response){
            payload.payment_reference = response.reference;

            // Create user account with payload
            createUserAccount(payload);
        },
        onClose: function(){
            registration_form_submit_btn.html("Pay your N500 now!").removeAttr("disabled");
            return false;
        }
    });
    handler.openIframe();
}
// const FLUTTERWAVE_PUBLIC_KEY = "FLWPUBK-18a7e40178895042a88fd793fe20b1ab-X";
const FLUTTERWAVE_PUBLIC_KEY = "FLWPUBK-8d26e66566e7d47afd7639da71f5c5ae-X";

function payWithRave(payload) {
    console.log(payload);
    console.log(payload.sub_account);
    var x = getpaidSetup({
        PBFPubKey: FLUTTERWAVE_PUBLIC_KEY,
        customer_email: payload.email,
        amount: 500,
        customer_phone: payload.phone,
        currency: "NGN",
        txref: "rave-"+Math.floor((Math.random() * 1000000000) + 1),
        /*meta: [{
            metaname: "payload",
            metavalue: JSON.stringify(payload)
        }],*/
        subaccounts: payload.sub_account,
        /*subaccounts: [
            {
                id: payload.sub_account, // This assumes you have setup your commission on the dashboard.
                transaction_charge: 400,
                transaction_charge_type: "flat_subaccount"
            }
        ],*/
        onclose: function() {
            registration_form_submit_btn.html("Pay your N500 now!").removeAttr("disabled");
            return false;
        },
        callback: function(response) {
            var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
            console.log("This is the response returned after a charge", response);
            if (
                response.tx.chargeResponseCode == "00" ||
                response.tx.chargeResponseCode == "0"
            ) {
                // Create user account with payload
                payload.payment_reference = txref;
                createUserAccount(payload);
            } else {
                // redirect to a failure page.
                registration_message.html('<small class="text-danger">Your payment failed, please try again.</small><br><br>');
                registration_form_submit_btn.html("Pay your N500 now!").removeAttr("disabled");
                registration_form_fields.removeAttr("disabled");
                return false;
            }

            x.close(); // use this to close the modal immediately after payment.
        }
    });
}

function createUserAccount(payload) {
    registration_message.html('<small class="text-success">Your payment has been made and we\'re creating your account now...</small><br><br>');
    // Create user using the same payload
    $.ajax({
        url: web_root + "/register",
        method: "post",
        data: JSON.stringify(payload),
        dataType: "json",
        contentType: "application/json",
        success: function (res) {
            window.location.reload(true);
        },
        error: function (error) {
            error = JSON.parse(error.responseText);
            //registration_form_submit_btn.html("").removeAttr("disabled");
            registration_message.html('<small class="text-danger">'+error.message+'</small><br><br>');
            return false;
        }
    });
}
