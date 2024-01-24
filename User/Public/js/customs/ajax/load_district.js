$(document).ready(function() {
    $(document).on('change', '#selectCity',function() {
        var _this = $(this);
        var city_id = _this.find('option:selected').val();

        $.ajax({
            url: './index.php?action=checkout&handel=get_district',
            method: "POST",
            data: {'city_id': city_id},
            success: (function(response) {
                var response_data = $(response).find('#selectDistrict');
                var district = response_data.find('option');
                $('#selectDistrict[name="district"]').html(district);
                $('select').niceSelect('update');
                $('.district .nice-select .option').removeClass('selected focus');
                $('.district .nice-select .option:first-child').addClass('selected focus');
                $('.district .nice-select .current').text($('.district .nice-select .option:first-child').text());
            })
        })
    });
});