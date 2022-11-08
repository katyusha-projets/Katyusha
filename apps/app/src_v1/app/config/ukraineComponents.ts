export const ukraineStatsProps = {
  stats: [
    { title: 'Refugees helped', value: '62,000', desc: 'Feb 22 - Aug 25' },
    { title: 'Donations received', value: '728k EUR', desc: '96% accountability' },
    { title: 'Children rescued', value: '23,503', desc: 'Helping the most vulnerable' }
  ]
}

const mIBPath = '/ukraine/volunteering-img/'
const mICount = 5
export const masonryImages: Array<string> = []
let i = 0
while(i < mICount) {
  i++
  masonryImages.push(`${mIBPath}/${i}.jpg`)
}

export const warStatsProps = {
  stats: [
    { title: 'Children killed during the war', value: '1,000', description: 'Each day, 5 children are injured and two are killed' },
    { title: 'Children displaced', value: '7.42 million', description: 'One month of war in Ukraine has led to the displacement of 4.3 million children' },
    { title: 'In need of humanitarian aid', value: '5.2 million', description: 'UNICEF estimates that 5.2 million children are in need of humanitarian assistance' }
  ]
}

const iSBase = '/ukraine/war/'
export const imageSliders = [
  `${iSBase}/unicef-ukraine-3.jpeg`,
  `${iSBase}/unicef-ukraine-1.jpeg`,
  `${iSBase}/refugee-children-01-ap-iwb-220302_1646239533222_hpMain_16x9_992.jpeg`,
  `${iSBase}/fcb32d8e-b3fd-4c86-8f0c-5704cac99ba2-Refugee_child_from_Ukraine.webp`,
  `${iSBase}/TASS_51442897.jpeg`,
  `${iSBase}/brest_fortress.webp`,
  `${iSBase}/1646050846655_tdy_news_7a_llamas_ukraine_refugees_220228_1920x1080-df51ly.jpeg`,
  `${iSBase}/5a29b868a3b47456358b459a.webp`,
  `${iSBase}/09c0734o_ukraine-refugees-afp-650_625x300_08_March_22.webp`,
  `${iSBase}/https___cdn.cnn.com_cnnnext_dam_assets_220302183115-16-ukraine-0302.jpg`,
  `${iSBase}/tumblr_nm58uwuw0L1qbnugoo1_1280.jpeg`
]

export const heroDemoProps = {
  heading: 'Components demo',
  backgroundImage: '/placeholders/ukraine/kids.jpg',
  subheading: 'Below are the super awesome components I created THEY ARE TOO GOOD',
  button: { title: 'Click me', onClick: () => {} }
}

export const donationCards = [
  { image: '/ukraine/breakfast.jpg', category: 'Food', title: 'Breakfast', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '19 EUR', title: 'Donate', buttonOnClick: () => {} } },
  { image: '/ukraine/train.jpg', category: 'Transportation', title: 'A train ticket', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '39 EUR', title: 'Donate', buttonOnClick: () => {} } },
  { image: '/ukraine/doggy.jpg', category: 'Pets', title: 'Pet food and medicine', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '45 EUR', title: 'Donate', buttonOnClick: () => {} } },
  { image: '/ukraine/hotel.jpg', category: 'Housing', title: 'Hotel room for 1 night', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '68 EUR', title: 'Donate', buttonOnClick: () => {} } },
  { image: '/ukraine/girl-book.jpg', category: 'Education', title: 'School supplies for one child', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '240 EUR', title: 'Donate', buttonOnClick: () => {} } },
  { image: '/ukraine/home.jpg', category: 'Housing', title: 'One month of rent', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '350 EUR', title: 'Donate', buttonOnClick: () => {} } }
]
