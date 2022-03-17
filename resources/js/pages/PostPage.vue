<template>
  <standard-layout>
    <v-container>
      <h1>Lorem impsum</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit labore
        quod velit iste blanditiis! Suscipit at perspiciatis maxime voluptas
        tempore vel eum sit provident repudiandae facere, nemo nostrum sunt
        accusantium?
      </p>
      <p>
        Neque, cumque, harum voluptatum architecto facere odit sint iste, quas a
        libero incidunt porro? Eius veniam similique, atque molestias, eveniet
        nihil minima officiis saepe suscipit doloribus, perferendis debitis
        obcaecati sed.
      </p>
      <p>
        Unde, laborum mollitia dignissimos excepturi quidem accusantium! Eveniet
        excepturi molestias incidunt, nisi in maiores vel inventore ratione ipsa
        blanditiis pariatur praesentium voluptates quibusdam dolorum porro unde
        consequuntur quod voluptate fuga.
      </p>
      <p>
        Iure dolorum dolore reiciendis harum voluptatem ducimus corporis. Dolore
        voluptatem labore, veritatis tempora saepe fugit exercitationem. Animi
        dolor sequi, illo consectetur inventore recusandae deleniti autem
        consequatur voluptate. Rem, deserunt quod?
      </p>
      <p>
        Facilis quod officia reiciendis nihil odio accusantium, modi adipisci
        sunt aperiam obcaecati fuga molestiae aliquid? At vero ut, temporibus
        pariatur iusto necessitatibus earum illum sapiente obcaecati maxime esse
        optio quae.
      </p>
      <p>
        Molestias, libero. A quidem ad qui ipsa laborum culpa pariatur natus
        nisi vel quaerat, dolore itaque, voluptatum maiores. Dolore ex laborum
        deserunt odio in provident sit dignissimos quibusdam. Ab, eum.
      </p>
      <p>
        Saepe porro inventore repudiandae recusandae minima quo qui explicabo
        eligendi laboriosam molestiae aspernatur, placeat, fugit fugiat maiores
        id corrupti perspiciatis distinctio eum iure architecto harum expedita
        reiciendis. At, ex totam.
      </p>
      <p>
        Aspernatur doloribus culpa dolorum autem, molestiae nulla rerum quod
        ullam quisquam totam veniam adipisci fugiat voluptatibus dolor quae ipsa
        impedit rem dignissimos hic corporis, neque odit labore. Exercitationem,
        facilis quidem.
      </p>
      <p>
        Aspernatur modi corrupti eveniet autem laudantium assumenda saepe
        numquam culpa voluptate similique sunt dolores porro tempora rem labore
        impedit dignissimos quisquam, aperiam non libero, dolorum consequuntur
        harum. Quia, necessitatibus enim.
      </p>

      <hr />

      <div>
        <h2>Comments</h2>

        <comment-component :comments="comments" :level="0" />

        <div class="mt-10">
          <h3 id="new-post">Add a new comment</h3>
          <div>
            <div v-if="replyTo">
              <span>{{ `Replying to ${this.replyTo.name}. ` }} </span>
              <a href="#new-post" @click="removeReply">Remove</a>
            </div>
            <v-text-field
              outlined
              v-model="commenterName"
              label="Name"
            ></v-text-field>
            <v-textarea outlined v-model="body" label="Comment"></v-textarea>
            <v-btn @click="send">Send</v-btn>
          </div>
        </div>
      </div>
    </v-container>
  </standard-layout>
</template>

<script>
import CommentAPI from "@/js/config/api/comment.js";
import StandardLayout from "./StandardLayout.vue";
import CommentComponent from "./CommentComponent.vue";
export default {
  data: () => ({
    commenterName: "",
    body: "",
    replyTo: null,
    comments: [],
  }),
  components: {
    StandardLayout,
    CommentComponent,
  },
  beforeMount: function () {
    this.$root.$on("replyToThis", this.replyComment);
    this.load();
  },
  methods: {
    load() {
      let ref = this;
      CommentAPI.index().then((res) => {
        let { data } = res;
        ref.comments = data;
      });
    },
    reset() {
      this.commenterName = "";
      this.body = "";
      this.replyTo = null;
    },
    send() {
      let ref = this;
      let replyToId = this.replyTo ? this.replyTo.id : null;
      CommentAPI.create({
        name: this.commenterName,
        body: this.body,
        parent_comment_id: replyToId,
      }).then((res) => {
        ref.reset();
        ref.load();
      });
    },
    replyComment(comment) {
      this.replyTo = comment;
    },
    removeReply() {
      this.replyTo = null;
    },
  },
};
</script>

<style>
</style>
