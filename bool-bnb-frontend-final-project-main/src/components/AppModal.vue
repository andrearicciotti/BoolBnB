<script>
import axios from "axios";
import { store } from "../store";
export default {
  props: {
    slug: String,
  },
  data() {
    return {
      name: "",
      lastname: "",
      email: "",
      text: "",
      loading: false,
      store,
      error: "",
      checkError: false,
      messageSucces: false,
    };
  },
  methods: {
    sendForm() {
      this.loading = true;
      const data = {
        name: this.name,
        lastname: this.lastname,
        email: this.email,
        message_content: this.text,
        slug: this.slug,
      };

      if (
        this.name === "" ||
        this.lastname === "" ||
        this.email === "" ||
        this.text === ""
      ) {
        this.loading = false;
        this.checkError = true;
        console.log(this.checkError);
        return (this.error = "Please check the fields");
      }

      this.name = "";
      this.lastname = "";
      this.email = "";
      this.text = "";

      axios
        .post(`${this.store.baseUrl}/api/apartments/${this.slug}/messages`, data)
        .then((resp) => {
          this.loading = false;
          console.log(resp);
          if (resp.data.success === true) {
            this.messageSucces = true;
          }
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => {
          this.loading = false;
        });
    },
    resetAll() {
      this.name = "";
      this.lastname = "";
      this.email = "";
      this.text = "";
      this.checkError = false;
      this.messageSucces = false;
    },
  },
};
</script>
<template>
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1
            class="modal-title fs-5"
            id="exampleModalLabel"
            v-if="messageSucces === false"
          >
            Contact the owner
          </h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            @click="resetAll()"
          ></button>
        </div>
        <!-- Form that once sended activates the axios call -->
        <form @submit.prevent="sendForm" v-if="messageSucces === false">
          <!-- Modal Body -->
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >Enter your information to be contacted</label
              >
              <div class="d-flex">
                <input
                  v-model="name"
                  type="text"
                  class="form-control me-1"
                  id="exampleFormControlInput1"
                  placeholder="Name"
                />
                <input
                  v-model="lastname"
                  type="text"
                  class="form-control"
                  id="exampleFormControlInput1"
                  placeholder="Lastname"
                />
              </div>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >Email address</label
              >
              <input
                v-model="email"
                type="email"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="name@example.com"
              />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Message</label>
              <textarea
                v-model="text"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
                placeholder="Your message here..."
              ></textarea>
            </div>
            <div v-if="checkError">
              <p class="text-danger">{{ error }}</p>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              @click="resetAll()"
            >
              Close
            </button>
            <button
              :disabled="loading"
              type="submit"
              class="btn btn-success"
              v-if="messageSucces === false"
            >
              {{ loading ? "We're sending the message..." : "Send" }}
            </button>
          </div>
        </form>
        <div v-if="messageSucces === true">
          <div class="modal-body">
            <p class="text-success text-center">message successfully send</p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              @click="resetAll()"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss"></style>
