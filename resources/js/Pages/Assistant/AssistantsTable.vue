<template>
  <data-table>
    <template #header>
      <th class="px-3 py-2 w-12 text-xs text-gray-500">
        <checkbox/>
      </th>
      <th class="w-1/3 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Profile</th>
      <th class="w-1/4 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Contact</th>
      <th class="w-1/4 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Associated Students</th>
      <th class="w-25 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
    </template>

    <tr v-if="computedAssistants.length > 0"
        v-for="assistant in computedAssistants"
        @click="showAssistant(assistant.id)"
        class="hover:bg-gray-50 cursor-pointer">

      <td class="text-center">
        <checkbox/>
      </td>

      <td class="px-3 py-3">
        <div class="flex items-center space-x-3">
          <div>
            <img class="rounded-full w-14" :src="assistant.user.profile_photo_url" alt=""/>
          </div>

          <div>
            <h4 v-text="`${assistant.user.first_name} ${assistant.user.last_name}`" class="font-medium"/>
            <p v-text="assistant.position.name" class="text-sm text-gray-600"/>

            <p class="text-xs text-gray-500">
              <span v-for="(program, i) in assistant.programs">
                  <span v-if="i !== 0">, </span>
                  <span>{{ program.name }}</span>
              </span>
            </p>
          </div>
        </div>
      </td>

      <td class="px-3">
        <div class="text-gray-600 text-sm">
          <p class="flex items-center mb-2">
            <svg width="18" height="18" viewBox="0 0 18 18" class="inline mr-1">
              <path d="m12.1 15.358a3.1 3.1 0 0 0 2.549-1.053c0.048-0.055 0.1-0.109 0.144-0.157a1.971 1.971 0 0 0 0.567-1.278 1.615 1.615 0 0 0-0.841-1.306l-1.899-1.315a1.34 1.34 0 0 0-1.818 0.1l-0.492 0.485a0.318 0.318 0 0 1-0.458 0.062 12.344 12.344 0 0 1-1.5-1.3 9.144 9.144 0 0 1-1.228-1.436 0.324 0.324 0 0 1 0.062-0.458l0.485-0.492a1.347 1.347 0 0 0 0.1-1.818l-1.338-1.915a1.628 1.628 0 0 0-1.306-0.834 1.909 1.909 0 0 0-1.271 0.567c-0.055 0.048-0.109 0.089-0.157 0.137a3.119 3.119 0 0 0-1.06 2.564c0 1.866 1.128 4.122 3.233 6.221s4.341 3.226 6.228 3.226zm0-1.019c-1.651 0.028-3.739-1.21-5.451-2.912s-3.019-3.878-2.984-5.537a2.279 2.279 0 0 1 0.759-1.75c0.041-0.041 0.082-0.068 0.123-0.1a0.928 0.928 0 0 1 0.581-0.253 0.536 0.536 0 0 1 0.479 0.267l1.242 1.857a0.466 0.466 0 0 1-0.062 0.649l-0.547 0.547a1.037 1.037 0 0 0-0.108 1.442 15.661 15.661 0 0 0 1.525 1.737 19.223 19.223 0 0 0 1.8 1.593 1.037 1.037 0 0 0 1.447-0.11l0.547-0.547a0.466 0.466 0 0 1 0.649-0.062l1.849 1.231a0.546 0.546 0 0 1 0.273 0.485 0.912 0.912 0 0 1-0.253 0.574c-0.041 0.048-0.068 0.082-0.1 0.13a2.332 2.332 0 0 1-1.769 0.759z"
                    fill="currentColor"/>
            </svg>

            <span v-text="assistant.user.phone"/>
          </p>

          <p class="flex items-center">
            <svg width="18" height="18" viewBox="0 0 18 18" class="inline mr-1">
              <path d="m2.28 9.031a6.484 6.484 0 0 0 6.884 6.854 9.229 9.229 0 0 0 2.68-0.349c0.438-0.144 0.581-0.369 0.581-0.622a0.441 0.441 0 0 0-0.451-0.444 1.679 1.679 0 0 0-0.314 0.048 9.17 9.17 0 0 1-2.283 0.308c-3.542-5e-3 -5.935-2.141-5.935-5.761 0-3.473 2.27-5.9 5.674-5.9 3.028 0 5.523 1.873 5.523 5.209 0 1.914-0.643 3.2-1.682 3.2a1 1 0 0 1-1.087-1.107v-4.294a0.529 0.529 0 0 0-0.554-0.595 0.534 0.534 0 0 0-0.561 0.595v0.7h-0.067a2.171 2.171 0 0 0-2.084-1.295c-1.668 0-2.844 1.422-2.844 3.473s1.165 3.507 2.878 3.507a2.212 2.212 0 0 0 2.133-1.449h0.068a1.777 1.777 0 0 0 1.928 1.449c1.825 0 2.953-1.757 2.953-4.245 0-3.753-2.762-6.193-6.59-6.193a6.536 6.536 0 0 0-6.85 6.911zm6.563 2.447c-1.128 0-1.839-0.937-1.839-2.427s0.718-2.42 1.846-2.42c1.148 0 1.88 0.923 1.88 2.386-5e-3 1.504-0.739 2.461-1.887 2.461z"
                    fill="currentColor"/>
            </svg>

            <span v-text="assistant.user.email"/>
          </p>
        </div>
      </td>

      <td class="px-3">
        <p class="text-gray-600 text-sm">
                    <span v-for="(student, i) in assistant.regular_students">
                        <span v-if="i !== 0">, </span>
                        <span>{{ student.code }}</span>
                    </span>
        </p>
      </td>

      <td class="px-3">
        <assistant-status-tag :status="assistant.status"/>
      </td>
    </tr>
    <tr v-else>
      <td colspan="5" class="text-center py-3 text-sm text-gray-500 bg-gray-50">
        No assistants
      </td>
    </tr>
  </data-table>
</template>
<script>
import AssistantStatusTag from "@/Pages/Assistant/AssistantStatusTag"
import Checkbox from "@/Jetstream/Checkbox";
import DataTable from "@/Components/DataTable";

export default {
  name: 'assistants-table',
  components: {DataTable, Checkbox, AssistantStatusTag},
  props: {
    assistants: Array,
    filter: Object
  },
  computed: {
    computedAssistants() {
      return this.assistants.filter(assistant => {
        if (this.filter.position) {
          return assistant.position.id === this.filter.position;
        }

        return true;
      });
    }
  },
  methods: {
    showAssistant(id) {
      this.$inertia.visit(this.route('assistant', id));
    }
  }
}
</script>
