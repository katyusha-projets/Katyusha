<script setup lang="ts">
export interface ProfileHeaderProps {
  active: string
}

const props = defineProps<ProfileHeaderProps>()
</script>

<template>
  <div>
    <div class="profile-header">
      <div class="profile-header-inner">
        <div class="profile-avatar">
          <AvatarSimple picture="https://i1.sndcdn.com/avatars-000248291936-634zqi-t500x500.jpg" size="xl" />
          <Title tag="h2" :size="4" narrow>Katyusha</Title>
          <p class="rem-100">4834 followers</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.profile-header {
  background: var(--wrap-bg-color);

  .profile-header-inner {
    position: relative;
    text-align: center;
    padding: 6rem 0 4rem;

    .profile-avatar {
      position: relative;

      .avatar {
        display: block;
        height: 100px;
        width: 100px;
        border-radius: 50%;
        margin: 0 auto 1rem;
      }

      p {
        color: var(--light-text);
      }
    }

    .tabs {
      position: absolute;
      bottom: 0;
      right: 0;
      left: 0;
      margin: 0 auto;

      ul {
        border: none;

        li {
          &.is-active {
            a {
              color: var(--primary);
              border-color: var(--primary);
            }
          }

          a {
            font-family: var(--font);
            border-color: transparent;
            border-width: 3px;
            margin-bottom: 0;
            color: var(--light-text);
          }
        }
      }
    }
  }
}
</style>
