var paypal = require('paypal-rest-sdk');

var clientId = 'AUJQ_LJCZq-WC5kZ8iU51T0LEcbMd-YPYVMY8g8YYghMJkQ7Ya2V_uf9SVU6T-mi-jU1zoTBngR5kSlb';
var secret = 'EBTHnufFKT7YewPhvQs5Q1kdAklDXCm0TKT-gAJ6qRGm7lULCkf11-j99N28mCnpJEAbL2QZ0NuOyzBV';

paypal.configure({
  'mode': 'sandbox', //sandbox or live
  'client_id': clientId,
  'client_secret': secret
});

var billingPlanAttribs = {
    "name": "Suscripción - Verificar.me",
    "description": "Pago mensual por la utilización del Plan Básico en la plataforma Verificar.me",
    "type": "fixed",
    "payment_definitions": [{
        "name": "Plan Básico",
        "type": "REGULAR",
        "frequency_interval": "1",
        "frequency": "MONTH",
        "cycles": "11",
        "amount": {
            "currency": "EUR",
            "value": "9.99"
        }
    }],
    "merchant_preferences": {
        "setup_fee": {
            "currency": "EUR",
            "value": "1"
        },
        "cancel_url": "http://localhost:3000/cancel",
        "return_url": "http://localhost:3000/processagreement",
        "max_fail_attempts": "0",
        "auto_bill_amount": "YES",
        "initial_fail_amount_action": "CONTINUE"
    }
};

var billingPlanUpdateAttributes = [{
    "op": "replace",
    "path": "/",
    "value": {
        "state": "ACTIVE"
    }
}];