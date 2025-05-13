<script lang="ts">
import type { AgChartOptions } from 'ag-charts-types';
import { AgCharts } from 'ag-charts-vue3';
import { defineComponent } from 'vue';

export default defineComponent({
    components: {
        AgCharts,
    },
    data() {
        return {
            options: {
                data: [
                    { asset: 'Entertainment', amount: 100 },
                    { asset: 'Bills', amount: 650 },
                    { asset: 'Fun', amount: 40 },
                    { asset: 'Necessities', amount: 100 },
                ],
                title: {
                    text: '',
                },
                series: [
                    {
                        type: 'donut',
                        angleKey: 'amount',
                        calloutLabelKey: 'asset',
                        innerRadiusRatio: 0.6,
                    },
                ],
            } as AgChartOptions,
        };
    },
});
</script>

<template>
    <div class="flex flex-col items-center justify-between gap-10">
        <div class="flex items-center justify-center">
            <div class="h-[300px] w-[300px]">
                <AgCharts :options="options" />
            </div>
        </div>
        <div class="flex flex-row justify-center gap-10 pb-7">
            <div class="flex flex-col border-l-4 border-blue-500 px-2">
                <span>Entertainment</span>
                <span class="text-base font-extrabold">$100</span>
            </div>
            <div class="flex flex-col border-l-4 border-orange-400 px-2">
                <span>Bills</span>
                <span class="text-base font-extrabold">$650</span>
            </div>
            <div class="flex flex-col border-l-4 border-emerald-500 px-2">
                <span>Fun</span>
                <span class="text-base font-extrabold">$40</span>
            </div>
            <div class="flex flex-col border-l-4 border-sky-300 px-2">
                <span>Necessities</span>
                <span class="text-base font-extrabold">$100</span>
            </div>
        </div>
    </div>
</template>
