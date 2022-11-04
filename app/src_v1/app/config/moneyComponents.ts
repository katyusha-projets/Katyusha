export const ukraineStatsProps = {
  stats: [
    { title: 'Refugees helped', value: '62,000', desc: 'Feb 22 - Aug 25' },
    { title: 'Donations received', value: '728k EUR', desc: '96% accountability' },
    { title: 'Children rescued', value: '23,503', desc: 'Helping the most vulnerable' }
  ]
}

const mIBPath = '/money/media/'
const mICount = 7
export const masonryImages: Array<string> = []
let i = 0
while(i < mICount) {
  i++
  masonryImages.push(`${mIBPath}/${i}.jpg`)
}

export const heroDemoProps = {
  heading: 'Components demo',
  backgroundImage: '/placeholders/ukraine/kids.jpg',
  subheading: 'Below are the super awesome components I created THEY ARE TOO GOOD',
  button: { title: 'Click me', onClick: () => {} }
}

export const donationCards = [
  { image: '/money/media/phone.jpg', category: 'Alerting', title: 'Smart-alerts', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '49 EUR', title: 'Add to package', buttonOnClick: () => {} } },
  { image: '/money/media/too-many-people.jpg', category: 'Services', title: 'Insiders forum', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '98 EUR', title: 'Add to package', buttonOnClick: () => {} } },
  { image: '/money/media/consulting.jpg', category: 'Services', title: 'One-on-one consulting', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci tortor. Phasellus pellentesque arcu gravida commodo laoreet.', shopping: { price: '398 EUR', title: 'Add to package', buttonOnClick: () => {} } }
]
