<template>
    <input class="focus:ring-primary focus:border-primary shadow-sm border-gray-300 rounded-md"
           type="tel"
           autocomplete="tel-national"
           :value="modelValue"
           @input="onInput"
           ref="input">
</template>

<script>
export default {
    props: ['modelValue'],

    emits: ['update:modelValue'],

    methods: {
        onInput(e) {
            this.$emit('update:modelValue', this.format(e.target.value, e.inputType))
            this.$forceUpdate()
        },

        format(str, inputType) {
            let x = "";
            let intl = false;

            for (let i = 0; i < str.length; i++) {
                if (i === 0 && str[i] === "+") {
                    intl = true;
                    continue
                }

                if ("1234567890".includes(str[i])) {
                    x += str[i];
                }
            }


            if (inputType === "insertFromPaste") {
                if (intl && x.length === 12) {
                    return "0" + x.substring(3, 5) + " " + x.substring(5, 8) + " " + x.substring(8, 12);
                }
            }

            if (!x || x.charAt(0) !== "0") return "";
            if (x.length <= 3) {
                return x;
            } else if (x.length <= 6) {
                return x.substring(0, 3) + " " + x.substring(3, x.length);
            } else {
                return x.substring(0, 3) + " " + x.substring(3, 6) + " " + x.substring(6, 10);
            }
        },
    }
}
</script>
