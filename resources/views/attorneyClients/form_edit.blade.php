@csrf
@method('PUT')
<div class="table-responsive">
    <table class="table table-bordered table-form">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Dob</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in form.products">
                <td class="table-first_name" :class="{'table-error': errors['products.' + $index + '.first_name']}">
                    <input class="table-control" v-model="product.first_name" name="products[@{{$index}}][first_name]">
                </td>
                <td class="table-middle_name" :class="{'table-error': errors['products.' + $index + '.middle_name']}">
                    <input type="text" class="table-control"  v-model="product.middle_name" name="products[@{{$index}}][middle_name]">
                </td>
                <td class="table-last_name" :class="{'table-error': errors['products.' + $index + '.last_name']}">
                    <input type="text" class="table-control" v-model="product.last_name" name="products[@{{$index}}][last_name]">
                </td>
                <td class="table-dob" :class="{'table-error': errors['products.' + $index + '.dob']}">
                    <input type="date" class="table-control" v-model="product.dob" name="products[@{{$index}}][dob]">
                </td>
                <td class="table-remove">
                    <span @click="remove(product)" class="table-remove-btn">&times;</span>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="table-empty" colspan="2">
                    <span @click="addLine" class="table-add_line">Add customer</span>
                </td>
            </tr>        
        </tfoot>
    </table>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary button-create-invoice">Saved</button>
    <a href="{{ route('attorneys.index') }}" class="btn btn-danger button-create-invoice">Cancel</a>
</div>
