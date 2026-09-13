<div class="card test-card" style="padding: 15px; background: #fff; border: 1px solid #ccd0d4;">
    <template>
    <el-backtop target=".test-card" visibility-height="10">
        <div style="
            heiht: 100%;
            width: 100%;
            background-color: #f2f5f6;
            text-align: center;
            line-height: 40px;
            color: #1989fa;
        ">
            UP
        </div>
    </el-backtop>
    </template>
    <h3>{{ 'TEST' || titulo }}</h3>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label>TEST NUEVO</label></th>
            <td>
                <?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?>
                <input type="text"  class="regular-text">
            </td>
        </tr>
    </table>
    <p style="margin-top: 15px;">
        <button class="button button-primary" @click="">
            NUEVO
        </button>
    </p>
    
    
</div>