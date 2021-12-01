@if(Session('success'))
    <script>
        $.bootstrapGrowl("{{Session('success')}}" , {
            ele: "body", //On which Element to Append
            type: "success", //This is for color
            offset: {from: "top", amount:20}, //Top or Bottom
            align: "right",
            width: 250, 
            delay: 1000,
            allow_dismiss: true,
        });
    </script>  
@elseif(Session('info'))
    <script>
        $.bootstrapGrowl("{{Session('info')}}" , {
            ele: "body", //On which Element to Append
            type: "info", //This is for color
            offset: {from: "top", amount:20}, //Top or Bottom
            align: "right",
            width: 250, 
            delay: 1000,
            allow_dismiss: true,
        });
    </script>  
@elseif(Session('danger'))
    <script>
        $.bootstrapGrowl("{{Session('danger')}}" , {
            ele: "body", //On which Element to Append
            type: "danger", //This is for color
            offset: {from: "top", amount:20}, //Top or Bottom
            align: "right",
            width: 250, 
            delay: 1000,
            allow_dismiss: true,
        });
    </script>
@endif