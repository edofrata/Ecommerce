<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Home");
?>


<!-- ---------------------------------TABLE FOR THE ORDERS ----------------------------------------------->

<body class="body_account">
    <div class="container mb-4 main-container justify-content-center">
        <div class="row">

            <!-- Orders Table-->
            <div class="col-lg-12 pb-5 ">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date Purchased</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // displays the user order in the account panel
                            $collection = collect_find('Orders');
                            $user_id = $_SESSION['customer']->_ID;
                            $findCriteria = ['customer_id' => $user_id];

                            $products = $collection->find($findCriteria)->toArray();


                            foreach ($products as $item) {

                                $id  = ((array) $item['_id'])['oid'];
                                $item = (array) $item;
                                user_orders($id, $item['date'], $item['cost']);
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-----------------------------------------------END TABLE-------------------------------------------------------------->
    <?php
    scripts();
    outputFooter();
    ?>



    <!-- 
<tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">78A643CD409</a></td>
                            <td>August 08, 2017</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td><span>$760.50</span></td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">34VB5540K83</a></td>
                            <td>July 21, 2017</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td>$315.20</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">112P45A90V2</a></td>
                            <td>June 15, 2017</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td>$1,264.00</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">28BA67U0981</a></td>
                            <td>May 19, 2017</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td>$198.35</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">502TR872W2</a></td>
                            <td>April 04, 2017</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td>$2,133.90</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">47H76G09F33</a></td>
                            <td>March 30, 2017</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td>$86.40</td>
                        </tr> -->