{* template block that contains the new field *}
{if $form.formClass != "CRM_Case_Form_CaseView"}
<div id="edit-age">
    {if $form.age_y.label}
        {ts count=$form.age_y.label plural='%count years'}%count year{/ts}
    {elseif $form.age_m.label}
        {ts count=$form.age_m.label plural='%count months'}%count month{/ts}
    {/if}
</div>
{*{debug}*}
{* reposition the above block after #someOtherBlock *}
{literal}
    <script type="text/javascript">
        CRM.$('#edit-age').insertAfter('#birth_date');
        CRM.$(function ($) {
            $("[name=birth_date]").on('change', function () {
                var today = new Date($('[name=deceased_date]').val());
                if (!today) {
                    var today = new Date();
                }
                if (isNaN(today.getDate())) {
                    var today = new Date();
                }

                var birthDate = new Date($('[name=birth_date]').val());
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                $('#edit-age').html(age + ' years old');
            });
        });
    </script>
{/literal}
{else}
    <table id="show-age-1">
    <tr class="crm-case-caseview-show-age" id="show-age">
        <td class="label-left description" style="padding: 1px">

        {if $form.age_y.label}
            {ts count=$form.age_y.label plural='AGE: %count years old'}}AGE: %count year old{/ts}
        {elseif $form.age_m.label}
            {ts count=$form.age_m.label plural='AGE: %count months old'}AGE: %count month old{/ts}
        {/if}
        </td>
    </tr>
    </table>
{*    {debug}*}
    {* reposition the above block after #someOtherBlock *}
{literal}
    <script type="text/javascript">
        CRM.$(function ($) {
            var $this = $('#show-age');
            $this.insertAfter($('[class=crm-case-caseview-birth_date]'));
            $("#show-age-2").html("");
        });
    </script>
{/literal}
{/if}