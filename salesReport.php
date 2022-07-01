<?php
$title = 'Sales Report';
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/database/models/Sales.php';

$salesObject = new Sales();
$salesData = $salesObject->read();
if ($salesData) {
    $sales = $salesData->fetch_all(MYSQLI_ASSOC);
} else {
    $message = "<div class='alert alert-danger text-center'>There's no sales have been done yet!</div>";
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-10 offset-1">
            <?php if (isset($message)) {
                echo $message;
            } ?>
            <table class="table">
                <thead>
                    <tr>
                        <?php if (isset($sales)) {
                            foreach ($sales as $key => $value) {
                                foreach ($value as $k => $v) {
                                    echo "<th>$k</th>";
                                }
                                break;
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($sales)) {
                            foreach ($sales as $key => $value) {
                                echo '<tr>';
                                foreach ($value as $k => $v) {
                                    if ($k == 'Tax Percentage') {
                                        echo "<th>$v %</th>";
                                    }else {
                                        echo "<td>$v</td>";
                                    }
                                }
                                echo '</tr>';
                            }
                        }
                        ?>                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include_once 'layouts/footer.php';
?>