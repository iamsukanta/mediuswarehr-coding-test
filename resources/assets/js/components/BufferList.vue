<template>
  <div class="card bg-white" style="background-color:#fff; padding:20px;">
    <div class="card-header">
      Recent Posts Sent to Buffer
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="input-group mb-2">
            <input type="text" class="form-control"  placeholder="Search" v-model="search_post">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group mb-2">
            <input type="date" class="form-control"  placeholder="Search" v-model="date_filter" @change="dateFilter">
          </div>
        </div>
        <div class="col-md-4">
          <select class="form-control" id="exampleFormControlSelect1" v-model="category_filter" @change="categoryFilter">
            <option value="allgroup">All group</option>
            <option value="Content Upload">>Content Upload</option>
            <option value="Content Curation">>Content Curation</option>
            <option value="RSS Automation">>RSS Automation</option>
          </select>
        </div>
      </div>
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
          <tr v-for="bufferPost in filteredPost" :key="bufferPost.id">
            <th>{{ bufferPost.group_info.name }}</th>
            <th>{{ bufferPost.group_info.type }}</th>
            <td>{{ bufferPost.account_info.name }}</td>
            <td>{{ bufferPost.post_text }}</td>
            <td>{{ bufferPost.created_at }}</td>
          </tr>
        </tbody>
      </table>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li :class="[{disabled: !pagination.prev_page_url}]" class="page-item" ><a @click="getBufferPosts(pagination.prev_page_url)" class="page-link" href="#">Previous</a></li>
          <li class="page-item" :class="[{'active-page': page==pagination.current_page }]" v-for="page in pagination.last_page" :key="page"><a class="page-link" @click="getBufferPosts(`http://localhost:8000/api/buffer-posts?page=${page}`)" >{{ page }}</a></li>
          <li :class="[{disabled: !pagination.next_page_url}]" class="page-item"><a  @click="getBufferPosts(pagination.next_page_url)" class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
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
        search_post: "",
        date_filter:"",
        category_filter:""
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
          this.bufferPosts = res.data.data.data;
          console.log(res.data.data);
          let pagination = {
            current_page: res.data.data.current_page,
            last_page: res.data.data.last_page,
            next_page_url: res.data.data.next_page_url,
            prev_page_url: res.data.data.prev_page_url,
          }
          this.pagination = pagination;
          console.log(this.pagination);

          // alert(res.data);
        })
        .catch(err => {
          console.log(err);
        });
      },

      dateFilter() {
        axios
        .post(
          'http://localhost:8000/api/buffer-posts/date-filter', {"date_filter": this.date_filter},
        )
        .then(res => {
          // console.log(res);
          this.bufferPosts = res.data.data.data;
          console.log(res.data.data);
          let pagination = {
            current_page: res.data.data.current_page,
            last_page: res.data.data.last_page,
            next_page_url: res.data.data.next_page_url,
            prev_page_url: res.data.data.prev_page_url,
          }
          this.pagination = pagination;
          console.log(this.pagination);

          // alert(res.data);
        })
        .catch(err => {
          console.log(err);
        });
        // console.log(this.date_filter);
      },

      categoryFilter() {
        axios
        .post(
          'http://localhost:8000/api/buffer-posts/category-filter', {"category_filter": this.category_filter},
        )
        .then(res => {
          // console.log(res);
          this.bufferPosts = res.data.data.data;
          console.log(res.data.data);
          let pagination = {
            current_page: res.data.data.current_page,
            last_page: res.data.data.last_page,
            next_page_url: res.data.data.next_page_url,
            prev_page_url: res.data.data.prev_page_url,
          }
          this.pagination = pagination;
          console.log(this.pagination);

          // alert(res.data);
        })
        .catch(err => {
          console.log(err);
        });
        // console.log(this.date_filter);
      }
    },
    computed: {
      filteredPost() {
        return this.bufferPosts.filter(post => {
          return post.post_text.toLowerCase().includes(this.search_post.toLowerCase())
        })
      },
    },



    mounted() {
      this.getBufferPosts();
    }
  }
</script>

<style scoped>
  .active-page a{
    color: #f00 !important;
  }
</style>
