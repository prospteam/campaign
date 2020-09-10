
  paypal.Buttons({
      style: {
          size:  'responsive', // small | medium | large | responsive
          shape: 'rect',   // pill | rect
          color: 'gold',   // gold | blue | silver | black
          layout: 'horizontal',
          label: 'pay'
    },
    funding: {
      allowed: [ paypal.FUNDING.CARD  ],
      disallowed: [ paypal.FUNDING.CREDIT ]
    },
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: membership
        },
    }],
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        console.log(details);
        $.ajax({
            method :'post',
            url    : $('.base_url').val()+'member/pay_subscription',
            data   : {
                    amount              : details.purchase_units[0].amount.value,
                    pp_payment_status   : details.status,
                    pp_payment_approved_date: details.update_time,
                    pp_account_name     : details.payer.name.given_name +' '+details.payer.name.surname,
                    pp_email            : details.payer.email_address,
                    pp_transactionid    : details.id,
            },
            dataType:'json',
            success: function(res){
                console.log(res);
                if (res.status) {
                    swal('Success','Subscription success.','success');
                    location.reload(true);
                }
            }
        });
      });
    }
}).render('#paypal-button-container');
