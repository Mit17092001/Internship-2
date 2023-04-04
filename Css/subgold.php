<html>
    <head>
        <style>
            body
            {
                background-color: rgb(240,250,230);
            }
            .body
            {
                font-family: Arial, Helvetica, sans-serif;
                border-style: solid;
                border-width:5px;
                border-color:rgb(50,100,150);
                margin:auto;
                margin-top:150px;
                width:300px;
                background-color: rgb(230,240,250);
                padding-top:20px;
                padding-bottom:20px;
                padding-left:20px;
                padding-right:20px;
            }
            input
            {
                width:100%;
                margin-top:5px;
                margin-bottom:20px;
                height:30px;
            }
        </style>
    </head>
    <body>
        <div class="body">
            <form>
                Enter Cardholder name<br>
                <input type="text" placeholder="SHAH MIT" required><br>
                Enter Card No.<br>
                <input type="number" placeholder="1111 2222 3333 4444"><br>
                <table>
                    <tr>
                        <td>Exp. Month</td> 
                        <td> Exp. Year</td> 
                    </tr>
                    <tr>
                        <td style="width:65%; ">
                            <div class="month">
                                <select name="Month" style="width:100%; height: 30px">
                                    <option value="january">January</option>
                                    <option value="february">February</option>
                                    <option value="march">March</option>
                                    <option value="april">April</option>
                                    <option value="may">May</option>
                                    <option value="june">June</option>
                                    <option value="july">July</option>
                                    <option value="august">August</option>
                                    <option value="september">September</option>
                                    <option value="october">October</option>
                                    <option value="november">November</option>
                                    <option value="december">December</option>
                                </select>
                            </div>
                        </td>
                        <td style="width:70%;">
                            <div class="year">
                                <select name="Year" style="width:100%; height:30px">
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2016">2025</option>
                                    <option value="2016">2026</option>
                                    <option value="2017">2027</option>
                                    <option value="2018">2028</option>
                                    <option value="2019">2029</option>
                                    <option value="2020">2030</option>
                                    <option value="2021">2031</option>
                                    <option value="2022">2032</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                </table>
                CVV <br>
                <input type="number" placeholder="123" required><br>    
            </form>
        </div>
    </body>
</html>