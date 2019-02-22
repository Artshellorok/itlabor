<template>
    <date-picker v-model="date" :config="options"></date-picker>
</template>

<script>
    export default {
        data(){
            return {
                date: '', 
                options: {
                    // https://momentjs.com/docs/#/displaying/
                    format: 'YYYY-MM-DD H:mm:ss',
                    useCurrent: false,
                    showClear: true,
                    showClose: true,
                    locale: 'ru',
                },
            }
        },
        components: {
            'date-picker': require('vue-bootstrap-datetimepicker')
        },
        
        mounted() {
            $.extend(true, $.fn.datetimepicker.defaults, {
                icons: {
                time: 'far fa-clock',
                date: 'far fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right',
                today: 'fas fa-calendar-check',
                clear: 'far fa-trash-alt',
                close: 'far fa-times-circle',
                }
            });
        }
    }
</script>
