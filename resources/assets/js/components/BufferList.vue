<template>
  <div class="card bg-white p-3" style="background-color:#fff">
    <div class="card-body">
      <table class="table table-light ">
        <thead>
          <tr>
            <th scope="col">Group Name</th>
            <th scope="col">Group Type</th>
            <th scope="col">Account Name</th>
            <th scope="col">Post Text</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="bufferPost in bufferPosts" :key="bufferPost.id">
            <th>1</th>
            <th>1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>


<script>
  export default {
    components: {
    },
    data() {
      return {
        bufferPosts: [],
        pagination: {
        },
      }
    },
    methods: {
      getBufferPosts(page_url) {
        page_url = page_url || `http://localhost:8000/api/buffer-posts`;
        axios
        .get(
          page_url,
        )
        .then(res => {
          // console.log(res);
          this.bufferPosts = res.data.data;
          console.log(this.bufferPosts);
          let pagination = {
            current_page: res.data.current_page,
            last_page: res.data.last_page,
            next_page_url: res.data.next,
            prev_page_url: res.data.prev,
          }
          this.pagination = pagination;
        })
        .catch(err => {
          console.log(err);
        });
      },
    },



    created() {
      this.getBufferPosts();
    }
  }
</script>

<style>

</style>
