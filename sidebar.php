<div class="col-md-3" style="padding-left: 0px;margin-top: 42px;">
    <!-- tim kiem -->
    <div class="row" style="margin-left: 0px;">
        <form action="danh-sach-sp.php" method="get">
            <!-- co ban -->
            <div class="search">
                <input type="text" placeholder="Tìm kiếm..." name="keywords">
                <button type="submit"><i class="fa fa-search" style="font-size:20px;color:rgb(255, 255, 255)"></i></button>
            </div>
            <!-- nang cao -->
            <button type="button" class="row" style="margin-left: 0; width: 100%; justify-content:center;" id="toggleButton">nâng cao</button>
            <div class="search-advanced row" id="advancedSearch" style="z-index: 3; width: 100%; margin-left: 0;  display: none;">
                <!-- danh muc -->
                <div class="danh-muc container">
                    <label for="danh-muc" class="form-label">Danh mục:</label>
                    <select class="form-select" name="danh-muc" id="search-danh-muc">
                        <option value="">Không</option>
                        <?php
                            require_once('../admin/dao/loai-hang.php');
                            $temp = loai_hang_select_all();
                            foreach ($temp as $item) {
                                extract($item);
                        ?>
                            <option value="<?= $ma_loai ?>"><?= $ten_loai ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- muc gia -->
                <div class="muc-gia container">
                    <?php
                        require_once('../admin/dao/loai-hang.php');
                        $temp = don_gia_max();
                        $max_value = $temp['don_gia'];
                    ?>
                    <label for="customRange1" class="form-label">Khoảng giá: 0 - <span id="value-of-range"></span></label> <br>
                    <input type="range" name="muc-gia" class="form-range" id="customRange1" min="1" max="<?= $max_value?>" value="<?= $max_value?>">
                </div>
                <!-- giam gia -->
                <div class="giam-gia container">
                    <label class="form-label">Mức giảm giá: <span id="discount"></span></label>
                    <!-- <input class="form-check-input" type="radio" name="giam-gia" value="" checked hidden> -->
                    <?php
                        $giam_gias = muc_giam_gia_select_all();
                        foreach ($giam_gias as $giam_gia) {
                            extract($giam_gia);
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="giam-gia" name="giam-gia" value="<?= $giam_gia?>">
                        <label class="form-check-label"><?= $giam_gia?>%</label>
                    </div>
                    <?php }?>
                </div>
            </div>
        </form>
    </div>

    <!-- danh muc -->
    <div class="row" style="margin-left: 0px;">
        <?php
        require_once('../admin/dao/loai-hang.php');
        extract($_REQUEST);
        $items = loai_hang_select_all();
        ?>
        <div class="row" style="margin-top: 35px;margin-left: 0px;">
            <ul class="list-group">
                <li class="list-group-item active">DANH MỤC</li>
                <?php foreach ($items as $item) {
                    extract($item);
                ?>
                    <a href="sp-cung-loai.php?ma_loai=<?= $ma_loai ?>">
                        <li class="list-group-item"><?= $ten_loai ?></li>
                    </a>
                <?php } ?>
            </ul>

        </div>

        <div class="row" style="margin-top: 35px;margin-left: 0px;">

            <ul class="list-group">
                <?php
                require_once('../admin/dao/hang-hoa.php');
                extract($_REQUEST);
                $items = hang_hoa_sale();

                ?>
                <li class="list-group-item active">SẢN PHẨM SALE UP 10 - 50%</li>
                <?php foreach ($items as $item) {
                    extract($item);
                ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-4"><a href="chi-tiet-sp.php?ma_hh=<?= $ma_hh ?>&ma_loai=<?= $ma_loai ?>"><img style="width:80px;" src="../hinh-anh/san-pham/<?= $hinh ?>" alt=""></a></div>
                            <div class="col-sm-8"><?= $ten_hh ?><br><br><b><?= number_format($don_gia - ($don_gia * $giam_gia / 100)) ?> VNĐ</b></div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<script>
    ///////////////////// value-range
    var slider = document.getElementById("customRange1");
    var output = document.getElementById("value-of-range");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value;
    }

    ///////////////////// value-ratio
    var radios = document.querySelectorAll('input[type="radio"]');
    var output_radios = document.getElementById("discount");

    // Add event listener to each radio button
    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            output_radios.innerHTML = this.value + "%"; // Update the value next to the label
        });
    });

    ///////////////////// advanced-tongle
    // Get the button and the div
    var toggleButton = document.getElementById('toggleButton');
    var advancedSearch = document.getElementById('advancedSearch');


    // Get value danh muc
    var danhMuc = document.getElementById('search-danh-muc');

    // Add click event listener to the button
    toggleButton.addEventListener('click', function() {
        // Toggle the visibility of the advanced search div
        if (advancedSearch.style.display === 'none') {
            advancedSearch.style.display = 'block';
        } else {
            advancedSearch.style.display = 'none';
            // reset danh muc
            danhMuc.value = null;
            // reset slider
            slider.value = <?= $max_value?>;
            output.innerHTML = <?= $max_value?>;
            // reset radio
            radios.forEach(function(radio) {
                radio.checked = false;
            });
        }
    });
</script>