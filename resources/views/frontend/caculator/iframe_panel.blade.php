<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="https://www.realtor.ca/dnight-Exit-shall-Braith-Then-why-vponst-is-proc" async></script>
    <!-- FavIcon and browser tile defaults (begin)-->
    <link id="favicon" rel="shortcut icon" href="/images/common/icons/browser/favicon.ico?v=3" type="image/x-icon" /><link rel="icon" href="/images/common/icons/browser/favicon.png?v=3" type="image/png" /><link rel="icon" sizes="32x32" href="/images/common/icons/browser/favicon-32.png?v=3" type="image/png" /><link rel="icon" sizes="64x64" href="/images/common/icons/browser/favicon-64.png?v=3" type="image/png" /><link rel="icon" sizes="96x96" href="/images/common/icons/browser/favicon-96.png?v=3" type="image/png" /><link rel="icon" sizes="196x196" href="/images/common/icons/browser/favicon-196.png?v=3" type="image/png" /><link rel="apple-touch-icon" sizes="152x152" href="/images/common/icons/browser/apple-touch-icon.png?v=3" /><link rel="apple-touch-icon" sizes="60x60" href="/images/common/icons/browser/apple-touch-icon-60x60.png?v=3" /><link rel="apple-touch-icon" sizes="76x76" href="/images/common/icons/browser/apple-touch-icon-76x76.png?v=3" /><link rel="apple-touch-icon" sizes="114x114" href="/images/common/icons/browser/apple-touch-icon-114x114.png?v=3" /><link rel="apple-touch-icon" sizes="120x120" href="/images/common/icons/browser/apple-touch-icon-120x120.png?v=3" /><link rel="apple-touch-icon" sizes="144x144" href="/images/common/icons/browser/apple-touch-icon-144x144.png?v=3" /><meta name="msapplication-TileImage" content="/images/common/icons/browser/favicon-144.png?v=3" /><meta name="msapplication-TileColor" content="#FFFFFF" />
    <!-- FavIcon and browser tile defaults (end) -->
    <meta name="robots" content="noindex" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" />
    <style type="text/css">
        body {
            font-family: 'Source Sans Pro', sans-serif !important;
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>
<body>

<div>
    <style>
        /* UI tweak since select2 removal */
        .ratehub-calc select {
            padding: 5px;
            line-height: 1em !important;
        }

        #payment-calc .rh-calc-main .total-mortgage-payment td.rh-col {
            padding-bottom: 0.5em !important;
        }

        #payment-calc .calc-tip-step5 .calc-tip-nib {
            transform: scaleY(-1);
        }

        .scenario-title {
            color: #23a1c0 !important;
            padding-top: 10px !important;
        }

        .scenario-title.scen4 {
            padding-right: 2%;
        }

        .ratehub-calc .rh-calc-tabs .rh-holder:hover a {
            background-color: #23A1C0 !important;
        }

        .ratehub-calc .rh-calc-tabs .rh-holder.selected a {
            background-color: white !important;
        }

        .section-title,
        .rh-title,
        .total, #Calculators .total-mortgage-payment {
            color: #23A1C0 !important;
        }

        .ratehub-calc label, .ratehub-calc input, .select2-drop label, .select2-drop input {
            display: inline;
        }

        #payment-calc .calc-tip-wrapper {
            background-color: #23A1C0;
        }

        #payment-calc .rh-calc-head .go {
            background-color: #23A1C0;
        }

        #afford-input tbody .afford-submit a {
            background-color: #23A1C0 !important;
        }

        .rh-checkbox-container .checked {
            color: #23A1C0 !important;
        }

        .rh .popover .popover-title {
            background-color: #23A1C0 !important;
        }

        #payment-calc .calc-tip-top,
        #payment-calc .calc-tip-middle,
        #payment-calc .calc-tip-bottom {
            background-color: #23A1C0 !important;
            background-image: none !important;
        }

        #payment-calc .calc-tip-nib {
            background-image: none !important;
            width: 0px !important;
            height: 0px !important;
            position: absolute;
            border-top: 25px solid #23A1C0 !important;
            border-left: 25px solid transparent !important;
        }

        #payment-calc .calc-tip-step5 .calc-tip {
            top: 2.75em !important;
        }

        #afford-input tbody .rh-tooltip-container {
            z-index: 1000 !important;
        }

        .ratehub-calc {
            margin: auto !important;
        }

        .subtitle {
            min-height: 70px;
            text-align: center;
            font-size: 2em;
            display: none; /** meeting feedback about double titles */
        }

        .ratehub-calc #calc_extension .rate-risk .ledger-items li:first-child + li,
        .ratehub-calc #calc_extension .section-content h4 {
            color: black;
        }

        .ratehub-calc #calc_extension .amortization tbody .highlight th {
            background-color: black !important;
        }

        /** Start To overcome the ratehub tooltips*/
        .shareDialogArrow, .shareButtonsBox {
            z-index: 1001 !important;
        }

        .overlay {
            z-index: 1000 !important;
        }
        /** End To overcome the ratehub tooltips*/

        .CalcIconCon {
            width: 40px;
            font-size: 2rem;
            margin-left: 160px;
            margin-bottom: -13px;
        }
    </style>



    <div id="CalculatorCon" style="padding-bottom: 50px;" data-iframe-height="">
        <div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.realtor.ca/Scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://www.realtor.ca/scripts/iframeResizer.contentWindow.min.js"></script>

<script>
    window.onerror = function () {
        window.parent.postMessage("PaymentCalcWidgetError", location.origin);
    };

    function loadCalculator() {
        window.parent.postMessage("PaymentCalcWidgetLoading", location.origin);
        loadWidget("#CalculatorCon>div", {
            widget: "calc-payment", rateinput: "text-only", lang: "en", ltt: "", cmhc: "", homePrice: '1549000.00', city: 'Richmond Hill', province: 'ON'
        });

    }
    $(document.body).one("ratehub.widget.loaded", function () {

        $('form').submit(function (event) {
            event.preventDefault();
            return false;
        });

        $('.rh-widget input').keypress(function (e) {
            if (e.which == 13) {
                $(this).find('.ask').trigger('click');
                return false;
            }
        });
        $(".rh-calc-head .col02 input#ask").keydown(function (e) {
            if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                if (dataLayer)
                    dataLayer.push({ event: "e_calculator_askingprice_or_mortgageamt_entered" });
            }
        });

        $('.rh-calc-main tbody.purchase,.rh-calc-main tbody.mortgage-options').prepend("<tr><td></td><td></td><td></td><td class='rh-title scenario-title scen1'>Scenario 1</td><td class='rh-title scenario-title scen2'>Scenario 2</td><td class='rh-title scenario-title scen3'>Scenario 3</td><td class='rh-title scenario-title scen4'>Scenario 4</td>");

        $('.rh-widget').attr('max-width', '1080px'); //Ratehub widget sets max-width based on window width - which in an iframe is not accurate - so lets set as per live



        var price = '{{$price}}';
        if (price) {
            $("#ask").val(price).blur();
            $("#undoValue", '');


            //Not sure why needed
            var attemptCount = 0;
            var updateCalcInterval = window.setInterval(() => {

                    if ($('#dp_dol1').val() == "") {
                updateCalculations();
                clearInterval(updateCalcInterval);
            } else if (attemptCount > 200) {
                clearInterval(updateCalcInterval);
            }
            attemptCount++;
        }, 100);
        }

        window.parent.postMessage("PaymentCalcLoaded", location.origin);
    });
</script>
<script type="text/javascript" src="https://www.ratehub.ca/assets/js/widget-loader.js?v=3" onload="loadCalculator()"></script>
