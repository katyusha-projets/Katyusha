<script setup lang="ts">
import ShopService from '~/app/services/ShopService'
import { ShopType } from '~/types/ShopTypes'

const router = useRoute()
const { namespace } = router.params
const service = new ShopService()
const shop = await service.get<ShopType>(`${namespace}`)
</script>

<template>
  <div class="dash">
    <div class="page__inner">
      <div class="page__container">
        <div class="shop">
          <div class="shop__background"><img :src="shop.banner" alt="Background" style="cursor: default;"></div>
          <div class="shop__tabs card js-tabs">
            <div class="shop__profile">
              <div class="shop__details">
                <div class="shop__wrap">
                  <img :src="shop.logo" class="shop-logo" alt="Avatar">
                  <div class="shop__info">{{ shop.description }}</div>
                </div>
              </div>
              <div class="shop__contacts">
                <button class="button shop__button">Follow</button>
              </div>
            </div>
            <div class="shop__control">
              <div class="shop__nav"><a class="shop__link js-tabs-link active" href="#">Products</a><a class="shop__link js-tabs-link" href="#">Followers</a><a class="shop__link js-tabs-link" href="#">Following</a></div>
            </div>
            <div class="shop__container">
              <div class="shop__tab js-tabs-item" style="display: block;">
                <div class="shop__products">
                  <div class="summary">
                    <div class="summary__preview">
                      <img :src="shop.banner" alt="Product">
                      <div class="summary__control">
                        <button class="summary__button"><svg class="icon icon-edit"><use xlink:href="#icon-edit"></use></svg></button>
                        <button class="summary__button"><svg class="icon icon-trash"><use xlink:href="#icon-trash"></use></svg></button>
                        <button class="summary__button" data-popup=".js-popup-product"><svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg></button>
                      </div>
                    </div>
                    <div class="summary__line">
                      <div class="summary__title">Bento Matte 3D Illustration</div>
                      <div class="summary__price">$64</div>
                    </div>
                    <div class="summary__rating">
                      <svg class="icon icon-star-fill"><use xlink:href="#icon-star-fill"></use></svg>4.8<div class="summary__counter">(87)</div>
                    </div>
                  </div>
                </div>
                <div class="shop__foot">
                  <button class="button-stroke button-small shop__button">Load more</button>
                </div>
              </div>
              <div class="shop__tab js-tabs-item" style="display: none;">
                <div class="shop__group">
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-1.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Reed Parker</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>16</span>products</div>
                          <div class="follower__counter"><span>3,568</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button follower__button_follow">Follow<span>ing</span></button>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-1@2x.jpg 2x" src="img/content/product-pic-1.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-2@2x.jpg 2x" src="img/content/product-pic-2.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-3@2x.jpg 2x" src="img/content/product-pic-3.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-2.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Tristian Hermiston</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>43</span>products</div>
                          <div class="follower__counter"><span>1,345</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button follower__button_follow">Follow<span>ing</span></button>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-4@2x.jpg 2x" src="img/content/product-pic-4.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-5@2x.jpg 2x" src="img/content/product-pic-5.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-6@2x.jpg 2x" src="img/content/product-pic-6.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-3.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Rosetta Gottlieb</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>9</span>products</div>
                          <div class="follower__counter"><span>876</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button follower__button_follow">Follow<span>ing</span></button><a class="button follower__button" href="message-center.html">Message</a>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-2@2x.jpg 2x" src="img/content/product-pic-2.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-3@2x.jpg 2x" src="img/content/product-pic-3.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-1@2x.jpg 2x" src="img/content/product-pic-1.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-4.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Reed Parker</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>43</span>products</div>
                          <div class="follower__counter"><span>1,345</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button follower__button_follow">Follow<span>ing</span></button>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-4@2x.jpg 2x" src="img/content/product-pic-4.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-5@2x.jpg 2x" src="img/content/product-pic-5.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-6@2x.jpg 2x" src="img/content/product-pic-6.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-5.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Tristian Hermiston</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>9</span>products</div>
                          <div class="follower__counter"><span>2,789</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button follower__button_follow">Follow<span>ing</span></button><a class="button follower__button" href="message-center.html">Message</a>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-6@2x.jpg 2x" src="img/content/product-pic-6.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-2@2x.jpg 2x" src="img/content/product-pic-2.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-1@2x.jpg 2x" src="img/content/product-pic-1.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                </div>
                <div class="shop__foot">
                  <button class="button-stroke button-small shop__button">Load more</button>
                </div>
              </div>
              <div class="shop__tab js-tabs-item" style="display: none;">
                <div class="shop__group">
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-1.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Reed Parker</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>16</span>products</div>
                          <div class="follower__counter"><span>3,568</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button">Unfollow</button>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-1@2x.jpg 2x" src="img/content/product-pic-1.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-2@2x.jpg 2x" src="img/content/product-pic-2.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-3@2x.jpg 2x" src="img/content/product-pic-3.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-2.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Tristian Hermiston</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>43</span>products</div>
                          <div class="follower__counter"><span>1,345</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button">Unfollow</button>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-4@2x.jpg 2x" src="img/content/product-pic-4.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-5@2x.jpg 2x" src="img/content/product-pic-5.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-6@2x.jpg 2x" src="img/content/product-pic-6.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-3.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Rosetta Gottlieb</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>9</span>products</div>
                          <div class="follower__counter"><span>876</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button">Unfollow</button><a class="button follower__button" href="message-center.html">Message</a>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-2@2x.jpg 2x" src="img/content/product-pic-2.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-3@2x.jpg 2x" src="img/content/product-pic-3.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-1@2x.jpg 2x" src="img/content/product-pic-1.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-4.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Reed Parker</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>43</span>products</div>
                          <div class="follower__counter"><span>1,345</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button">Unfollow</button>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-4@2x.jpg 2x" src="img/content/product-pic-4.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-5@2x.jpg 2x" src="img/content/product-pic-5.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-6@2x.jpg 2x" src="img/content/product-pic-6.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                  <div class="follower">
                    <div class="follower__details">
                      <div class="follower__avatar"><img src="img/content/avatar-5.jpg" alt="Avatar"></div>
                      <div class="follower__wrap">
                        <div class="follower__man">Tristian Hermiston</div>
                        <div class="follower__list">
                          <div class="follower__counter"><span>9</span>products</div>
                          <div class="follower__counter"><span>2,789</span>followers</div>
                        </div>
                        <div class="follower__btns">
                          <button class="button-stroke follower__button">Unfollow</button><a class="button follower__button" href="message-center.html">Message</a>
                        </div>
                      </div>
                    </div>
                    <div class="follower__gallery">
                      <div class="follower__preview"><img srcset="img/content/product-pic-6@2x.jpg 2x" src="img/content/product-pic-6.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-2@2x.jpg 2x" src="img/content/product-pic-2.jpg" alt="Core - Dashboard Builder"></div>
                      <div class="follower__preview"><img srcset="img/content/product-pic-1@2x.jpg 2x" src="img/content/product-pic-1.jpg" alt="Core - Dashboard Builder"></div>
                    </div>
                  </div>
                </div>
                <div class="shop__foot">
                  <button class="button-stroke button-small shop__button">Load more</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.shop-logo {
  display: block;
  height: 57px;
}
</style>
