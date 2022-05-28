<form id="formUpdateData" class="mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="text_field_ROE_FY14" class="col-sm-4 col-form-label">ROE_FY14</label>
                <div class="col-sm-8">
                    <input type="hidden" readonly name="action" id="action" value="update">
                    <input type="hidden" readonly name="text_field_CMGUnmaskedID" id="text_field_CMGUnmaskedID">
                    <input type="hidden" readonly name="text_filed_NPAT_AllocEq_FY14" id="text_filed_NPAT_AllocEq_FY14">
                    <input type="hidden" readonly name="text_filed_NPAT_AllocEq_FY15X" id="text_filed_NPAT_AllocEq_FY15X">
                    <input type="hidden" readonly name="text_filed_Deposits_EOP_FY14" id="text_filed_Deposits_EOP_FY14">
                    <input type="hidden" readonly name="text_filed_Deposits_EOP_FY15x" id="text_filed_Deposits_EOP_FY15x">
                    <div class="input-group">
                        <input type="text" class="form-control col-md-5" name="text_field_ROE_FY14" id="text_field_ROE_FY14">
                        <div class="input-group-text">%</div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="text_field_ROE_FY15" class="col-sm-4 col-form-label">ROE_FY15</label>
                <div class="col-sm-8">
                    <div class="input-group">
                    <input type="text" class="form-control col-md-5" name="text_field_ROE_FY15" id="text_field_ROE_FY15">
                        <div class="input-group-text">%</div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="text_field_REVENUE_FY14" class="col-sm-4 col-form-label">REVENUE_FY14</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="text_field_REVENUE_FY14" id="text_field_REVENUE_FY14">
                </div>
            </div>
            <div class="form-group row">
                <label for="text_field_REVENUE_FY15" class="col-sm-4 col-form-label">REVENUE_FY15</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="text_field_REVENUE_FY15" id="text_field_REVENUE_FY15">
                </div>
            </div>
            <div class="form-group row">
                <label for="text_field_RWAFY14" class="col-sm-4 col-form-label">RWAFY14</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="text_field_RWAFY14" id="text_field_RWAFY14">
                </div>
            </div>
            <div class="form-group row">
                <label for="text_field_RWAFY15" class="col-sm-4 col-form-label">RWAFY15</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="text_field_RWAFY15" id="text_field_RWAFY15">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="text_field_TotalLimits_EOP_FY14" class="col-sm-5 col-form-label">TotalLimits_EOP_FY14</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="text_field_TotalLimits_EOP_FY14" id="text_field_TotalLimits_EOP_FY14">
                </div>
            </div>
            <div class="form-group row">
                <label for="text_field_TotalLimits_EOP_FY15" class="col-sm-5 col-form-label">TotalLimits_EOP_FY15</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="text_field_TotalLimits_EOP_FY15" id="text_field_TotalLimits_EOP_FY15">
                </div>
            </div>
            <div class="form-group row">
                <label for="text_field_Company_Avg_Activity_FY14" class="col-sm-5 col-form-label">Com_Avg_Act_FY14</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="text_field_Company_Avg_Activity_FY14" id="text_field_Company_Avg_Activity_FY14">
                </div>
            </div>
            <div class="form-group row">
                <label for="text_field_Company_Avg_Activity_FY15" class="col-sm-5 col-form-label">Com_Avg_Act_FY15</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="text_field_Company_Avg_Activity_FY15" id="text_field_Company_Avg_Activity_FY15">
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="button" onclick="updateDataCsv()">Save</button>
            </div>
        </div>
    </div>
</form>