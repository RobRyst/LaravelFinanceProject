<template>
  <AppLayout title="User List">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        User List
      </h2>
    </template>

 

    <div class="py-12">
      <div class="mx-auto max-w-7xl lg:max-w-none sm:px-6 lg:px-8">
        <br />
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
          <ShowUserList @showSelectedRow="showSelectedRowModal"
          />
          <ShowUserInfoModal
            v-if="showModal"
            @close="showModal = false"
            :userInfo="this.datafield"
          />
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ShowUserInfoModal from "./modal/showUserInfoModal.vue";
import ShowUserList from "@/Pages/Admin/ShowUserList.vue";


export default defineComponent({

  components: {
    AppLayout,
    ShowUserInfoModal,
    ShowUserList,
  },

  data() {
    return {
      showModal: false,
      datafield: "",
    };
  },

  methods: {
    showSelectedRowModal(e) {
      this.datafield = e;
      // console.log(this.datafield);
        this.showModal = true;
    },
  },

  mounted() {
  }

});
</script>


Fra vuejs filen:
methods: {
        getUserList(){
        axios
            .get(route("getUserList"))
            .then(resp => (this.rowData = resp.data.data)).then(
            )
            .catch(err => console.log(err.response.data));
        },
}

web.php
Route::middleware(['auth:sanctum', 'verified'])->get('/getUserList', [GetController::class, 'getUserList'])->name('getUserList');

Controller:
public function getUserList()
    {
        $users = User::get()->toArray();
        return response()->json(['data' => $users]);
    }