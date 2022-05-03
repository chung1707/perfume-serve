<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\productDetail;

class ProductDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productDescriptions = [
            // women
            [
                'desc' => 'Hương thơm của Beach Walk là một sự kết hợp giữa phong vị tươi mát và rạng rỡ của các nốt hương cam bergamot, nước cốt dừa, chanh và hồ tiêu hồng. Thêm vào đó, nốt hương xạ hương đầy gợi cảm giúp khơi dậy những xúc cảm quen thuộc của một khoảnh khắc tưởng chừng như đã lãng quên. Thêm vào đó hương nước cốt dừa thêm vào một chút âm hương nhiệt đới lôi cuốn và kỳ ảo. Hãy nhắm mắt và để cho hương thơm của Beach Walk đưa bạn trở về khoảnh khắc của một chuyến dạo bộ trên bờ biển vào buổi xế chiều, khi đôi chân của bạn lún xuống những đụn cát ướt và cơn sóng biển nhẹ nhàng phết qua làn da của bạn. Với ánh nắng mặt trời dần tắt, cảm giác ấm áp nhẹ nhàng pha lẫn với những cơn gió nhẹ nhàng mang hương biển. Beach Walk dã thành công trong việc nắm bắt những tinh túy của sự hạnh phúc vô tư lự của một ngày mùa hè.',
                'concentration' => 'parfume',
            ],
            [
                'desc' => 'Một sáng tạo thơm với chủ điểm hoa hồng Damask. Tên chính thức của hồng Damask bắt nguồn từ thủ đô của Syria ngày ngay là thành phố Damascus, và vẫn được cho rằng, thành phố Damascus chính là nơi sinh ra loài hoa hồng huyền thoại với cánh hoa dày và mùi thơm vô cùng quyến rũ này. Mùi hương là sự kết hợp của hoa hồng với một loại các nốt hương trái cây khác như lê, chanh, quả lý chua đen và dâu tây. Damask như đưa ta dạo chơi trong một khu vườn tràn ngập các loại cây và một sáng sớm tinh mơ, khi mà những ánh nắng mới chỉ le lói qua kẽ lá đang còn đầm sương đêm, vô cùng thư thái và bình yên. Khi mùi hương dịu xuống, xạ hương và hổ phách xuất hiện cùng hoa hồng bền bỉ từ đầu chí cuối, tạo ra một cái vibe ngọt ngào nhẹ nhàng cực kì dễ thương.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Matcha Meditation mở đầu với mùi bột trà Matcha dậy lên rất thơm, xanh, có phần chát nhẹ, có chút citrus sáng và fresh, theo sau đó là mùi hoa trắng, rõ nhất là mùi hoa nhài. Matcha ở đây làm không ngậy, không béo như Tea Escape mà cảm giác mùi trà làm thật hơn rất nhiều, có lẽ là thật nhất trong những chai mùi trà tôi từng ngửi, chắc chắn nếu bạn là một kẻ nghiện trà thì sẽ thích kiểu làm mùi này của Maison Margiela. Cái opening này kéo dài không lâu, một lúc sau mùi trà dịu xuống dần, hoa lên rõ hơn và cân bằng hơn. Từ từ ta sẽ thấy nó có vị ngọt nhẹ đến từ Chocolate trắng, kết hợp với hoa cam và hoa nhài tạo ra một cái drydown thực sự rất tinh tế, mê mẩn. Hậu vị của trà thì thường luôn ngọt, và tôi thích cái sự biến chuyển có phần giống với uống trà này. Điều duy nhất tôi cảm thấy hơi tiếc ở Matcha Meditation, đó là giá mà mùi trà làm dày hơn chút thì thực sự là hoàn hảo. Nhưng thế này có lẽ cũng là quá đủ với một tác phẩm mùi hương lấy cảm hứng từ trà rồi, vì nếu chơi nước hoa mùi trà lâu thì bạn sẽ thấy thường mùi trà luôn có xu hướng dịu đi như vậy. Cá nhân tôi cho rằng, Matcha Meditation là một phiên bản nâng cấp cực kì đáng giá so với Tea Escape. Mùi trà của Matcha Meditation làm thật hơn, không bị ngọt hay ngậy quá như Tea Escape. Chính vì thế tôi đánh giá mùi hương này đúng tinh thần “trà” hơn, và nếu bạn không phải là một người quá hảo ngọt, thì Matcha Meditaion chắc chắn là một mùi hương trà không thể bỏ qua.',
                'concentration' => 'parfume',
            ],
            [
                'desc' => 'Signorina là tiếng Ý, nó có ý nghĩa là một người phụ nữ trẻ, tràn đầy sự sống, hồn nhiên và yêu đời. Những note hương tươi sáng của Quả lý chua đỏ được tẩm ướt cùng Hồng tiêu mang tới sự táo bạo trong cách chuyển mùi của cô nàng này, nhẹ nhàng nhưng đầy sự kiêu kỳ. Signorina mang trong mình cả một vườn hoa, với sự thanh tao của Hoa nhài, ngọt ngào của Hoa hồng và sự mong manh, tiểu thư của Hoa mẫu đơn. Cô nàng Signorina EDP với vẻ bề ngoài rất dễ thương, nhút nhát, nhưng khi chạm tới, Hương vị của bánh Panacotta hòa cùng xạ hương, biến sự nữ tính đó trở thành vũ khí hấn dẫn mọi ánh nhìn, ấm áp và đầy thân thiện.',
                'concentration' => 'eau de toilette',
            ],
            [
                'desc' => 'Tôi biết khá nhiều bạn nữ luôn chăm chút cho phòng ngủ của mình, từ trang trí cho đến chọn mùi hương. Đặc biệt với mấy ngày mệt mệt các bạn ấy lại càng cầu kì về vấn đề này. Có lẽ Maison Martin Margiela cũng hiểu điều đó nên đã gửi một món quà cho họ bằng việc pha chế Lazy Sunday Morning. Tôi ưng Maison Martin Margiela về cái cách đặt tên những sáng chế của mình, và đây là một perfect name khiến bạn tưởng tượng ngay đến sắc thái từng giọt hương thư giãn . Một số bạn bè tôi nói rằng, Lazy Sunday Morning khiến người ta làm biếng bởi nó quá giống vải giường chiếu được giặt sạch, rất thoáng và trong trẻo.
                Tôi không phải là tín đồ của xạ hương hay aldehydes, vậy nên thời gian đầu khi thử Lazy Sunday Morning tôi không được ưng cho lắm. Nhưng cái điểm khiến tôi lựa chọn chai nước hoa này là bởi tôi lại thường mê đắm cái hương hoa hồng, và hương hồng tại đây được kết hợp rất vừa mũi và quấn quýt. Nếu chấm 10 điểm cho những cánh hồng ở Lazy Sunday Morning thì xạ hương lúc drydown cũng chẳng dưới con số 8, nó tựa như mấy món phấn phủ cao cấp nhưng dày dặn và ít powdery hơn.
                Lazy Sunday Morning dễ cảm nhận nhưng cũng có phần lạ lẫm. Mùi hương bám toả ở mức khá (khoảng 5-6h). Hãy dành thời gian thư giãn và cảm nhận nhẹ nhàng với 1 shot ban đầu và tăng lên theo nhu cầu đậm – nhạt của bạn. Chẳng may lại thành món hương không thể thiếu để bạn chìm vào giấc ngủ, thì đừng trách tôi khiến bạn mê mùi giường chiếu chẳng chịu rời xa nha.',
                'concentration' => 'parfume',
            ],
            [
                'desc' => 'Sau thành công của nước hoa Scandal, vào năm 2020, hãng nước hoa Jean Paul Gaultier tiếp tục cho ra mắt phiên bản So Scandal với hương tổng thể nồng nàn hơn, sâu lắng hơn, hứa hẹn mang đến nhiều bất ngờ thú vị cho các nàng.
                Nước hoa nữ Jean Paul Gaultier So Scandal được lấy cảm hứng từ người phụ nữ thanh lịch nhưng có nhiều nét cá tính của người phụ nữ hiện đại, mạnh mẽ. Thành phần hương chính khá đa dạng với các loại hoa nhài sambac, hoa huệ mang đến nét đẹp thanh lịch, tinh tế nhưng cũng rất thời thượng. Phúc bồn tử hòa quyện với hương sữa ngọt ngào rất khó lẫn lộn với những mùi hương khác, vừa mang đến sự bùng nổ vừa đem lại dư vị sâu lắng, đam mê khó cưỡng lại. Vẫn giữ lại thiết kế độc đáo như phiên bản Scandal cũ, So Scandal có thêm các đường sọc nổi dọc thân chai, đem đến cảm giác sành điệu, bắt mắt hơn. Nắp chai vẫn có hình dáng đôi chân thon dài quyến rũ quen thuộc, như một biểu tượng rất thu hút của dòng nước hoa này.',
                'concentration' => 'eau de toilette',
            ],
            [
                'desc' => 'Trong tiếng Pháp, “Voulez-Vous Coucher Avec Moi” có nghĩa là “Anh có muốn ngủ với em?”. Voulez-Vous Coucher Avec Moi có thể nói là mùi hương của người phụ nữ đã trưởng thành, không giành cho những em gái teen mới lớn. Chủ đạo của chai nước hoa này là hoa trắng và hoa Hoàng lan xen lẫn Vanilla tạo ra một cái vibe mùi mà chúng ta có thể dùng từ “mời gọi”. Ban đầu, bạn sẽ thấy hoa huệ và dành dành xen chút cảm giác phấn son trang điểm. Lúc sau, hoàng lan tỏa lên kết hợp với vanilla. Đến cuối, ta cảm nhận được cái base với đàn hương kem kem, bột bột hơi ngọt nhẹ cực kì sảng khoái. Voulez-Vous Coucher Avec Moi với tôi đẹp từ hình thức đến mùi hương, một mùi hương rất nên có của các chị em… ',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Royal Princess Oud là một hương thơm hoa quyến rũ được tăng cường bởi hoa hồng, violet ngọt ngào và cam bergamot Sicilia, nhường chỗ cho hương thơm ấm áp của vani và hoa diên vĩ. Các nốt hương mang tính biểu tượng của oud và benzoin mang đến lớp hương gỗ khô gợi cảm cho eau de parfum cổ điển và nữ tính này. Nước hoa nữ Royal Princess Oud được cho ra mắt vào năm 2015. Đây là dòng nước hoa Creed thuộc nhóm Oriental Floral (Hương hoa cỏ phương đông) hướng đến độ tuổi trên 25 tuổi. Olivier Creed chính là nhà pha chế ra loại nước hoa này.',
                'concentration' => 'parfume',
            ],
            [
                'desc' => 'Nước hoa Love in White là một chai nước hoa thuộc dòng hương hoa cỏ – phương Đông dành cho nữ giới. Lấy cảm hứng từ việc thích đi thuyền buồm, chai nước hoa tượng trưng cho cảm giác tuyệt vời của tự do với cảm hứng hài hòa từ biển cả, và ngoài ra đây còn là một sự kết hợp từ các nguyên liệu đến từ năm châu lục. Love in White được ra mắt vào năm 2005 và đã được tinh chế bởi bàn tay tài ba của Erwin Creed đời thứ 7 và Olivier Creed đời thứ 6. Nước hoa được tinh chế bao gồm tinh chất cao quý của hoa hồng Bulgary, hoa diên vĩ, và mộc lan. Love in White sẽ đón chào bạn bằng một hương thơm của quả cam, đến từ miền Nam nước Tây Ban nha. Hương thơm của hoa nhài Ý, hoa thủy tiên vùng Riviera của Pháp, gạo, hoa diên vĩ Ai Cập và hoa mộc lan của Guatemala kết hợp với nhau để tạo nên lớp hương giữa. Lớp hương cuối mỏng manh và gợi cảm được tạo thành từ hỗn hợp ấm áp của vani, gỗ đàn hương và long diên hương. Chai nước hoa mang một tông màu trắng tinh khôi với các họa tiết được khắc trên thân chai cùng với một chiếc nơ bạc được buộc quanh cổ chai. Tổng thể chai nước hoa mang lại một sự nữ tính tinh khiết. Love in White tạo nên một bầu không khí lãng mạn với thoang thoảng sự tươi mát của hương phấn. Lớp hương đầu khá táo bạo, nhưng sự tinh tế của các nốt hương sau nhanh chóng xoa dịu và tạo nên một mùi hương thích hợp với những dụp đặc biệt hoặc nhưng lúc hẹn hò. Hương thơm mang lại một sự lãng mạn ngọt ngào với một chút gợi cảm.',
                'concentration' => 'parfume',
            ],
            [
                'desc' => 'Nước hoa nữ Fleurs de Gardenia phù hợp với người trên 25 tuổi. Đây là dòng nước hoa Creed này có độ lưu hương tạm ổn từ 3 giờ đến 6 giờ, độ tỏa hương thuộc dạng rất gần – thoang thoảng trên làn da. Fleurs de Gardenia phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa xuân, hạ. Đây là dòng nước hoa Creed thuộc nhóm Floral Green (Hương hoa cỏ xanh tự nhiên). Olivier Creed, Olivier Creed Sixth Generation chính là nhà pha chế ra loại nước hoa này. Bên cạnh đó, Hoa sơn chi và Hoa mẫu đơn là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'concentration' => 'parfume',
            ],
            // Men
            [
                'desc' => 'Không còn xa lạ với hình ảnh những con tàu hải quân đầy oai phong lẫm liệt, giăng buồm xuôi gió ngự trị cả biển khơi, nhà Creed đã dành một niềm yêu thích, đúng hơn là một sự ưu ái đặc biệt dành riêng cho Viking Creed. Được cho là món quà của những tâm hồn thích lang thang, đam mê được khám phá đến bất tận, Viking Creed sớm khẳng định vị thế của mình trên thị trường bằng phong thái dạn dĩ, nguồn năng lượng không thể đong đếm của mình. Lênh đênh trên những con sóng và mặn mòi mùi biển, Viking Creed ngay tầng hương đầu đã trao cho ta ánh nhìn kiên cường rất đỗi thân thiện với sự thanh mát của nhà Cam chanh, điểm thêm nét gai góc nam tính từ Tiêu hồng thoáng cay. Dành cả cuộc đời mình để tìm kiếm những chân trời phù du, người đàn ông Viking Creed mạnh mẽ nhưng cũng lãng mạn đến không ngờ với Hoa hồng trong tầng hương giữa. Gửi gắm chút ân cần, hương hoa cùng Bạc hà mát lạnh càng làm nổi bật lên tông hương thanh cay ấp ủ ngày càng đậm vị của Tiêu hồng.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => '2020 là một năm đáng nhớ, hay theo cách chúng ta hay nói đùa là năm Covid. Đại dịch xảy ra ảnh hưởng khá nhiều tới cuộc sống mọi người, mọi ngành nghề. Tuy nhiên trong năm này cũng có khá nhiều sáng tạo thơm hay ho ra đời. Và như đã nói ở trên, tôi rất có cảm tình với dòng Giò, thế nên tôi rất hứng thú với Giò Profondo tức Giò xanh.
                Giò xanh với tôi là một chai khá hay ho. Cảm giác là một bản trưởng thành hơn, nam tính hơn của Giò trắng vậy. Xịt ra, cảm giác vẫn thế, vẫn là cái DNA quen thuộc như Giò trắng với cam chanh và hương biển. Tuy nhiên, ngửi kĩ sẽ thấy Giò xanh so với Giò trắng thì sẽ thiên hơn chút về hương biển, cảm giác khá là mát mẻ dễ chịu. Thêm nữa, nếu bạn là một người khá nhạy cảm với các mùi theo hướng hương biển, thường sẽ cảm thấy nhiều mùi có cảm giác gì đó hơi lợ và …tanh. Tuy nhiên Giò xanh làm mùi hương biển khá tốt, khó mà có thể khiến người khác bạn cảm thấy khó chịu. Về sau, cảm nhận rõ nhất có lẽ là mùi của oải hương lên rất mượt mà, một chút ngọt nhẹ của amber trên nền xạ và hoắc hương. Lúc này mùi hương trở nên khá nam tính.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Creed Himalaya là sự kết tinh của tình cha con thắm thiết khi được tác chế bởi chính Olivier Creed và người con trai thân yêu của ông – Erwin Creed. Với thiết kế vỏ ngoài trông giống kim loại, tác giả đã ẩn ý tái hiện lại những đỉnh đồi phủ tuyết sáng lấp lánh dưới ánh mặt trời vàng ươm. Với tầng hương đầu có thể khơi dậy sức sống ngay lập tức cho bất kể ai, Bưởi, Cam bergamot và Chanh vàng như giải phóng những nét hương mọng nước, ngọt thanh đầy trẻ trung của mình. Sự kết hợp của nhà Cam chanh ánh lên những nét màu tươi tắn và bừng sáng nhất, thắp lên một tông màu tích cực cho tổng thể Creed Himalaya. Đơn chiếc nhưng không nhạt nhòa, tầng hương tiếp theo với vỏn vẹn Đàn hương đã không làm Creed Himalaya kém thu hút, mà thậm chí ngược lại, tôn lên vẻ đẹp độc tôn của hương gỗ vững chãi này. Mạnh mẽ đầy bộc trực, Đàn hương đã tạc nên bức tượng người đàn ông hiện đại, đơn giản nhưng không kém phần thời thượng. Cùng Tuyết tùng ở hương nền, mùi gỗ phảng phất ban đầu giờ đây dần đậm nét hơn, cuốn lấy ánh nhìn của ta đến vô tận. Chưng cất thêm vị tinh tế và thanh tao, Xạ hương và Long diên hương – hai thứ quà quý từ thiên nhiên – làm chao đảo khứu giác ta với vẻ quyến rũ, bồng bềnh, ngọt sắc không thể khước từ của mình.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Roja là một trong những hãng nước hoa xa xỉ bậc nhất thế giới. Với nhiều sáng tạo thơm với vàng bên trong, có giá lên tới cả nghìn đô hoặc cao hơn, nhà điều hương Roja Dove đã khẳng định rằng trong nước hoa của ông, vàng không phải là thành phần đắt giá nhất. Roja Elysium Parfum Cologne là một chai nước hoa được cho là cách nhập môn khá “dễ chịu” vào thế giới mùi hương đắt đỏ của Roja Dove. Mùi hương theo hướng tươi mát, nhiều cam chanh và một vài note fruity ở opening cho cảm giác cực kì nịnh mũi và khoan khoái. Mùi hương dịu đi một lúc hiện rõ lên cỏ hương bài, một chút gỗ và thành phần đắt giá nhất là Long diên hương tạo cho Elysium một vibe cực kì sang, đúng theo cách người ta nói về các mùi hương của Roja Dove – “ngửi là thấy giàu”.',
                'concentration' => 'eau de toilette',
            ],
            [
                'desc' => 'Nước hoa nam Dark Lord phù hợp với người thuộc mọi độ tuổi.  Dark Lord phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa thu, đông. Đây là dòng nước hoa By Kilian thuộc nhóm Leather (Hương da thuộc). Bên cạnh đó, Rượu Rum và Da thuộc là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'concentration' => 'eau de toilette',
            ],
            [
                'desc' => 'CAROLINA HERRERA BAD BOY là mùi nước hoa nam thứ chín trong bộ sưu tập nước hoa Herrera. BAD BOY thể hiện tính hai mặt của con người trong biểu tượng táo bạo của nam tính mới. Mạnh mẽ nhưng nhạy cảm, anh hùng nhưng dễ bị tổn thương, BAD BOY tự tin vào chính mình, nắm lấy mọi khía cạnh của tính cách trái ngược của mình. BAD BOY Eau de Toilette nắm bắt được nhiều khía cạnh của soái ca đương đại trong một mùi hương hiện đại bùng nổ nhưng tinh vi. Phiên bản nam tính mới xuất hiện trong một chai điêu khắc rất hấp dẫn với thành phần là cam bergamot xanh, cây xô thơm, hạt tiêu, đậu tonka, cacao, gỗ tuyết tùng và gỗ hổ phách . Kết quả là một mùi hương nam tính thủ công với một cạnh sành ăn nổi bật. Hương thơm được đóng gói trong một chai hình tia sét – sự thay thế điêu khắc cho giày cao gót của Good Girl.',
                'concentration' => 'eau de toilette',
            ],
            [
                'desc' => 'Nước hoa unisex Ombré Leather (2018) phù hợp với người trên 25 tuổi.Đây là dòng nước hoa Tom Ford này có độ lưu hương lâu 10 giờ đến 12 giờ và độ tỏa hương thuộc dạng gần – toả hương trong vòng một cánh tay. Ombré Leather (2018) phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa thu, đông. Đây là dòng nước hoa Tom Ford thuộc nhóm Leather (Hương da thuộc).',
                'concentration' => 'eau de toilette',
            ],
            [
                'desc' => 'Một năm sau sự ra mắt của phiên bản hiện đại của Gentleman Givenchy đi ra mới phiên bản Eau de Parfum của nó. Gentleman Givenchy từ năm 2017 là một diễn giải của bản gốc từ những năm 70, phù hợp với người đàn ông hiện đại. Gương mặt của nước hoa là nam diễn viên người Anh Aaron Taylor-Johnson. Quý ông mới Eau de Parfum được tạo ra bởi Olivier Cresp và Nathalie Lorson từ Firmenich. Trong kim tự tháp thơm mới, có ghi chú của hạt tiêu đen, hoa oải hương, orris, hoắc hương và vani đen',
                'concentration' => 'eau de toilette',
            ],
            [
                'desc' => 'Sau dòng nước hoa Violet Blonde, Tom Ford cho ra mắt một mẩu nước hoa mới – Tom Ford Noir, với hương thơm và thiết kế mang đậm vẻ mạnh mẽ, bí ẩn, đặc biệt vô cùng thơm mát, cay nồng. Tất cả tạo nên một chai nước hoa thanh lịch, nam tính, chứa đựng nhiều bất ngờ. Đây được xem là chai nước hoa mang bước đột phá lớn của Tom Ford. Hương thơm khởi đầu với mùi hương của cam Bergamot, hồ tiêu hồng và hồ tiêu. Sau một khỏang thời gian, mùi hương lắng dần và định hình thành một mùi hương ngọt ngào vani và nhựa cây mang vị mặn. Hương thơm toát ra vẻ hào phóng, đầy tao nhã do sự góp mặt của hổ phách, nhờ hoắc hương làm cho tổng thể mùi hương trở nên ấm áp, thơm mùi thảo dược thanh mát. Nước hoa đem lại hương hoa tươi tắn, mang lại một cảm giác lôi cuốn ngọt ngào. Hương cuối còn lưu lại đó thật tuyệt vời với tinh chất đầy quyến rũ, gợi cảm, vương vấn mãi không thôi. Tất cả cảm giác hương cuối mang lại đều là nhờ vào nét hoang dại, táo bạo mà tổ hợp hương mang lại, ngoài ra nhựa thơm và các loại gia vị được hòa quyện với mùi hương của thân thảo, làm cho nước hoa trở nên ấm áp và mang hương vị đất. Đây là mẫu nước hoa sang trọng, mang đậm phong cách cổ điển, tuyệt vời nhất mà Tom Ford có thể mang lại. Tinh chất như bột mịn quấn quýt quanh cơ thể, với hương thơm của gỗ và xạ hương, đầy quyến rũ, cuốn hút. Noir mang thiết kế thân chai hộp vuông thanh lịch, cổ điển, với màu đen tuyền huyền bí, chứa đựng tinh chất nước hoa đầy gợi cảm, thể hiện được phong thái mạnh mẽ, nam tính của Tom Ford.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Versace đã tung ra một loại nước hoa mới dành cho nam giới mang tên là Eros, được lấy cảm hứng và kết nối sâu sắc với thần thoại Hy Lạp. Mục đích của dòng nước hoa này là khơi gợi và thể hiện sự mạnh mẽ và đam mê. Nước hoa được đặt theo tên của vị thần tình yêu và cũng là con của vị thần Aphrodite là Eros. Eros được sáng tạo bởi Aurelen Guichard của thương hiệu Givaudan.',
                'concentration' => 'eau de toilette',
            ],

            // unisex
            [
                'desc' => 'Vào năm 2007, Tom Ford là một trong số ít những người sử dụng gỗ trầm hương trong bộ sưu tập Private Blends của mình, và ngày nay, Oud Wood (gỗ trầm hương) không những trở thành một trong những tác phẩm cổ điển của riêng thương hiệu Tom Ford, mà có một bộ sưu tập mới với tên gọi “Oud Collection” đã được ra đời với các mùi hương gỗ trầm hương, gỗ đàn hương và hoắc hương giữ vai trò chủ đạo. Oud Wood được xếp vào nhóm “cay nồng phương đông” dành cho cả nam lẫn nữ giới.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Thương hiệu Tom Ford đã cho ra mắt một mùi hương thuộc dòng cam quýt – aromatic mới dành cho cả nam lẫn nữ với tên gọi Neroli Portofino vào năm 2011. Neroli Portofino được tạo ra bởi nhà sáng chế nước hoa  dành tiếng Rodrigo Flores-Roux. Giống như một chiếc sơ mi trắng được cắt may theo số đo của người mặc, Neroli Portofino mang trong mình một mùi hương cam quýt nhẹ nhàng và cổ điển như trong dòng nước hoa eau de cologne nhưng chất lượng của từng thành phần dường như rất khác biệt. Mở đầu sẽ là sự bùng nổ mạnh mẽ của tinh dầu hoa cam và các lớp hương mùi cam quýt, bao gồm cam bergamot, chanh và cây son tạo nên một bó hoa tràn ngập hương cam – nhài thơm ngát. Tiếp đến, bó hoa này được kết hợp với những loại thảo mộc xanh tự nhiên từ oải hương và hương thảo. Cuối cùng, hương gỗ và hổ phách bao bọc xung quanh, mang theo sự ấm áp bao bọc mùi hương tươi mát lúc ban đầu. Dường như Neroli Portofino đang dẫn bạn dạo chơi trên những con đường lộng gió ở vùng Rivera tại nước Ý xinh đẹp.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Thương hiệu Tom Ford đã cho ra mắt một mùi hương dành cho cả nam lẫn nữ mới với tên gọi Tobacco Vanille vào năm 2007. Tobacco Vanille thuôc nhóm hương cay – phương đông. Ngay từ những giây phút ban đầu, mùi hương ngọt ngào như những viên kẹo dẻo vị trái cây tươi ngon đầy hấp dẫn sẽ chào đón bạn. Đó là một mùi vị gần giống quê-vani của đậu tonka và hỗn hợp vani, ca-cao và các loại trái cây khô. Kéo theo là mùi hương của những điếu thuốc lá tuy già cỗi nhưng vẫn rất sang trọng, Tobacco Vanille dần trở nên khô ấm, dễ chịu và ngọt ngào hơn. Ngay khi mùi bạn nghĩ rằng mùi hương sẽ lắng xuống, thì chúng lại trở nên mạnh mẽ hơn và làm bạn choáng ngợp. Tobacco Vanille là một loại nước hoa khá nồng và bạn nên cẩn thận khi sử dụng.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Nước hoa unisex Fucking Fabulous phù hợp với người trên 25 tuổi.Đây là dòng nước hoa Tom Ford này có độ lưu hương rất kém – dưới 1 giờ. và độ tỏa hương thuộc dạng rất gần.  Fucking Fabulous phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa thu, đông. Da thuộc và Hạnh nhân đắng là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Thương hiệu Tom Ford đã cho ra mắt một mùi hương xoay quanh hương da thuộc nằm trong bộ sưu tập Private Blend collection với tên gọi Tuscan Leather vào năm 2007. Tuscan Leather được tạo ra bởi bộ đôi nổi tiếng Harry Frémont và Jacques Cavallier Trong Tuscan Leather, những nghịch lý về mùi hương đang dần được hé lộ khi kết hợp hỗn hợp da thuộc đắng khói với húng tây, mâm xôi và nghệ tây. Khá kỳ lạ, tinh khiết nhưng oi bức, khô ráo nhưng ngọt ngào. Mặc dù mùi hương da thuộc giữ đúng tính chất nồng nàn của mình, Tuscan Leather vẫn sẽ làm bạn phải rung động với những đường nét tinh tế, nhẹ nhàng và đầy nữ tính khi hỗn hợp thảo mộc, hoa cỏ và trái cây ngọt ngào phá vỡ các định kiến xưa nay về mùi hương da thuộc; tựa như một chiếc áo khoác da cứng và gai góc nhưng trở nên mềm mượt hơn sau khi được mặc nhiều lần.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Nước hoa unisex Straight to Heaven Extreme được cho ra mắt vào năm 2017. Đây là dòng nước hoa By Kilian thuộc nhóm Woody Spicy (Hương gỗ cay nồng) hướng đến độ tuổi trên 25 tuổi. Sidonie Lancesseur chính là nhà pha chế ra loại nước hoa này. Straight to Heaven Extreme có độ lưu hương rất lâu – trên 12 giờ và độ tỏa hương thuộc dạng rất xa – toả hương trong vòng bán kính trên 2 mét. Straight to Heaven Extreme phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa xuân, thu, đông. Bên cạnh đó, Rượu Rum và Gỗ tuyết tùng Virginia 2 là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Nước hoa unisex Intoxicated được cho ra mắt vào năm 2014. Đây là dòng nước hoa By Kilian thuộc nhóm Aromatic Spicy (Hương thơm cay nồng) hướng đến độ tuổi trên 25 tuổi. Calice Becker chính là nhà pha chế ra loại nước hoa này. Intoxicated có độ lưu hương rất lâu – trên 12 giờ và độ tỏa hương thuộc dạng gần – toả hương trong vòng một cánh tay. Intoxicated phù hợp để sử dụng  vào mùa thu, đông. Bên cạnh đó, Bạch đậu khấu và Cà phê là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => '“Memento Mori” là một trong những câu thành ngữ trong tiếng Latin với ngụ ý nhắc nhở đến điểm dừng chân cuối cùng của một đời người. Đó là lí do tại sao, Black Phantom lại mang trong mình vẻ ngoài khá rùng rợn, ma mị khi đem biểu tượng họp sọ đính bên trên chiếc hộp chứa đựng mùi hương này.
                Nghe thì có vẻ khá là đáng sợ khi hương thơm này mang ý nghĩa từ một câu nói khá nhạy cảm và chẳng vui vẻ gì. Nhưng ngược lại hoàn toàn đằng sau câu chuyện đó, Kilian Black Phantom lại mang đến cho chủ nhân mình sự quyến rũ, sang trọng từ nốt hương Rượu Rum và Sô cô la đen chủ đạo bên trong.
                Có lẽ, từ chính thông điệp Memento Mori, Kilian Black Phantom được tạo ra như một lọ thuốc tinh thần chứa đựng đầy xúc cảm ngọt ngào, dễ chịu để tạo ra được một ngày tuyệt vời, đáng quý nhắc nhở chúng ta trân trọng cuộc sống mình.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Musk Oud là dòng nước hoa từ nhà Kilian có độ lưu hương lâu – 7 giờ đến 12 giờ và độ tỏa hương thuộc dạng gần – toả hương trong vòng một cánh tay. Musk Oud phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa thu, đông. Alberto Morillas chính là nhà pha chế ra loại nước hoa này. Bên cạnh đó, Gỗ trầm hương và Xạ hương là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'concentration' => 'eau de parfume',
            ],
            [
                'desc' => 'Một sự áp đảo cho một hương thơm tinh tế, dựa trên một bông hồng, hương tím, tan chảy với gỗ đàn hương và cà phê. Một hương thơm hấp dẫn và huyền bí.',
                'concentration' => 'parfume',
            ],
        ];
        for ($i = 0; $i < count($productDescriptions); $i++) {
            productDetail::create([
                'description' => $productDescriptions[$i]['desc'],
                'concentration' =>  $productDescriptions[$i]['concentration'],
                'release' => 2010,
                'saveIncense' => 8,
                'age' => 25,
                'spring' => 94,
                'summer' => 96,
                'fall' => 70,
                'winter' => 40,
                'daytime' => 95,
                'night' => 60,
                'fragrant' => [
                    'scent' => ['hương gỗ', 'hương trái cây'],
                    'topNotes' => ['cam begamot', 'quả dứa', 'quả lý chua đen', 'táo xanh'],
                    'middleNotes' => ['cây hoắc hương', 'gỗ bu-lô', 'hoa hồng', 'hoa nhài morocco'],
                    'baseNote' => ['hương vani', 'long diên hương', 'rêu sồi', 'xạ hương'],
                ]
            ]);
        }
    }
}
