var map = AmCharts.makeChart("mapdiv",{
    type: "map",
    theme: "dark",
    projection: "mercator",
    panEventsEnabled : true,
    backgroundColor : "#FFFFFF",
    backgroundAlpha : 1,
    zoomControl: {
    zoomControlEnabled : true,
    },
    dataProvider : {
    map : "worldHigh",
    getAreasFromMap : true,
    areas :
    [
        {
            "id" : "LK",
            "url" : "sri-lanka/index.html",
            "title" : "Sri Lanka - 130 properties",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id" : "MY",
            "url" : "malaysia/index.html",
            "title" : "Malaysia - 90 properties",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MX",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "VI",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "KE",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "NG",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "KH",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "VN",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "CR",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "CU",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "DO",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "SV",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GT",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "HT",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "HN",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "JM",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "NI",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "PA",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "PR",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BO",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BR",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "CO",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "EC",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "PY",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "PE",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "VE",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "AO",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BJ",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BF",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BI",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "CM",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "CF",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "TD",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "CD",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "ER",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "ET",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GM",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GN",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "LR",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MG",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MW",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "ML",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MR",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MZ",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "NE",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "CG",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "RW",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "SN",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "SL",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "SO",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "SD",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "TZ",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "TG",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "UG",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "ZM",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "IN",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "ID",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MM",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "PH",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "SG",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "TH",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "AI",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "AG",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "AW",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BS",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BB",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BZ",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "VG",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "KY",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "DM",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GD",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GP",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MQ",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MS",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "KN",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "LC",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MF",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "VC",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "TT",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "TC",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GF",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GY",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "SR",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "KM",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "DJ",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GQ",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GA",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "GW",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "MU",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "YT",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "RE",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "ST",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "SC",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "BN",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        },
        {
            "id": "TL",
            "color" : "#009933",
            "rollOverColor" : "#75CFED"
        }
    ]
    },
    areasSettings : {
    autoZoom : true,
    selectedColor : "#B4B4B7",
    color : "#B4B4B7",
    colorSolid : "#84ADE9",
    outlineColor : "#707070",
    rollOverColor : "#B4B4B7",
    rollOverOutlineColor : "#B4B4B7",
    },
    "mouseWheelZoomEnabled": true
    });